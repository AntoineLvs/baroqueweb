<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\LocationType;
use App\Models\Product;
use App\Models\Service;
use App\Models\Tenant;
use App\Models\User;
use App\Scopes\TenantScope;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Panoscape\History\Events\ModelChanged;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  ddd(auth()->user()->tenant_id);

        // if(session()->has('tenant_id')) {
        //
        //   $tenant_id = auth()->user()->tenant_id;
        //   $products = Product::where('tenant_id', $tenant_id)->paginate(25);
        //   return view('products.index', compact('products'));
        // }
        //
        // else {

        $locations = Location::latest()->paginate(25);

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $location_types = LocationType::all();

        return view('locations.create', compact('location_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request, Location $model): RedirectResponse
    {
        //ddd($request->all());
        //$request(all());

        $search1 = $request->address;
        $search2 = $request->zipcode;

        $geodata = $this->getGeoResponse($search1, $search2);


        $location = new Location;


        $location->name = $request->name;
        $location->description = $request->description;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->zipcode = $request->zipcode;
        $location->country = $request->country;

        $location->lng = $request->lng;
        $location->lat = $request->lat;


        $location->opening_start = $request->opening_start;
        $location->opening_end = $request->opening_end;
        $location->opening_info = $request->opening_info;


        $location->location_type_id = $request->location_type_id;

        $selectedServices = $request->service_id;
        $cleanedArray = array_map(
            fn ($val) => intval(trim($val)),
            explode(',', $selectedServices)
        );
        $location->service_id = json_encode($cleanedArray);

        $selectedProducts = $request->product_id;
        $cleanedArray = array_map(
            fn ($val) => intval(trim($val)),
            explode(',', $selectedProducts)
        );
        $location->product_id = json_encode($cleanedArray);

        $user = auth()->user();
        $tenant_id = $user->tenant_id ?? 0;
        $location->tenant_id = $tenant_id;

        //  $model->create($request->all());

        $location->save();

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Location $location): View
    {

        $location_types = LocationType::all();

        return view('locations.edit', compact('location', 'location_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Location $location): View
    {
        $location_types = LocationType::all();

        // Sets the location to verified status
        $location->verified = 0;
        $location->save();

        return view('locations.edit', compact('location', 'location_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Location  $product
     */
    public function update(LocationRequest $request, Location $location): RedirectResponse
    {
        $location->name = $request->name;
        $location->description = $request->description;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->zipcode = $request->zipcode;
        $location->country = $request->country;

        $location->lng = $request->lng;
        $location->lat = $request->lat;


        $location->opening_start = $request->opening_start;
        $location->opening_end = $request->opening_end;
        $location->opening_info = $request->opening_info;


        $location->location_type_id = $request->location_type_id;

        $selectedServices = $request->service_id;
        $cleanedArray = array_map(
            fn ($val) => intval(trim($val)),
            explode(',', $selectedServices)
        );
        $location->service_id = json_encode($cleanedArray);

        $selectedProducts = $request->product_id;
        $cleanedArray = array_map(
            fn ($val) => intval(trim($val)),
            explode(',', $selectedProducts)
        );
        $location->product_id = json_encode($cleanedArray);
        $location->verified = 0;
        $location->status = 1;
        $location->update();
        $location->save();

        return redirect()
            ->route('locations.edit', $location)
            ->with('message', '' . $location->name . ' informations have been successfully updated. Please wait for the changes to apply on the Find page.')
            ->with('locationId', $location->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location): RedirectResponse
    {
        $location->delete();

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location was deleted successfully.');
    }

    public function getGeoResponse($search1, $search2)
    {

        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/' . $search1 . '%20' . $search2 . '.json?limit=1&access_token=sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZwZW5xeDc2MmswMnFvazVtZGNnamF4In0.ENCXpCZYbOzm9WGzd2NeDg');

        $data = json_decode($response, true);

        return $data;
    }

    public function insertLocation(Request $request, $geodata)
    {

        $username = 'elsenmedia';
        $dataset_id = 'ckvp5lkl80hod20mh9ck9xifu';
        // default public token
        // $token = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZlYW9iZHQwcXJpMm9vMHp6YXl2dHFhIn0.FqjCjUzMT0v_HsVw2bSxbw';

        // hofhub-2 accessToken
        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZwZW5xeDc2MmswMnFvazVtZGNnamF4In0.ENCXpCZYbOzm9WGzd2NeDg';

        $feature_id = '1234';

        $title = $request->title;
        $description = $request->description;

        $body = [
            'id' => $feature_id,
            'type' => 'Feature',
            'properties' => [
                'title' => $request->title,
                'description' => $request->description,
            ],
            'geometry' => [
                'coordinates' => [-87.637595, 41.940405],
                'type' => 'Point',
            ],
        ];

        $jsonbody = json_encode($body);

        // FORWARD geocoding to convert adress to geo infor

        $response = Http::withBody(
            json_encode($body),
            'application/json'
        )
            ->put('https://api.mapbox.com/datasets/v1/elsenmedia/ckvp5lkl80hod20mh9ck9xifu/features/' . $feature_id .
                '?access_token=sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJja3ZwZW5xeDc2MmswMnFvazVtZGNnamF4In0.ENCXpCZYbOzm9WGzd2NeDg');

        echo $response;

        //ddd($response);
        //  return back();

    }

    public function showLocationProfile($id): View
    {

        $location = Location::withoutGlobalScope(TenantScope::class)->find($id);


        // Get the list of services associated to the location
        $serviceIds = json_decode($location->service_id);

        $services = Service::whereIn('id', $serviceIds)->get();

        // Get the list of products associated to the location
        $productIds = json_decode($location->product_id);
        $products = Product::whereIn('id', $productIds)->get();

        return view('locations.profile-locations-public', compact('location', 'services', 'products'));
    }

    public function showTenantProfile($tenant_id): View
    {
        $tenant = Tenant::find($tenant_id);

        // Get the list of locations associated to this tenant
        $locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('tenant_id', $tenant_id)
            ->get();

        $products = Product::whereIn('id', $locations->pluck('product_id')->flatten()->unique())->get();
        $services = Service::whereIn('id', $locations->pluck('service_id')->flatten()->unique())->get();

        return view('locations.profile-tenants', compact('tenant', 'locations', 'products', 'services'));
    }

    public function showProducts($id): View
    {

        $location = Location::withoutGlobalScope(TenantScope::class)->find($id);

        // Get the list of products associated to the location
        $productIds = json_decode($location->product_id);
        $products = Product::whereIn('id', $productIds)->get();

        return view('locations.show-products', compact('location', 'products'));
    }

    public function showLocationFinder(): View
    {
        return view('locations.find-locations-public');
    }

    public function showLocationFinderMap(): View
    {
        return view('locations.find-locations-map');
    }

    public function showLocationFinderTest(): View
    {
        return view('locations.find-locations-test');
    }

}

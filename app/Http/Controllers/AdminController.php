<?php

namespace App\Http\Controllers;

use App\Jobs\PushToMapbox;
use App\Models\Location;
use App\Models\ProductType;
use App\Models\BaseService;
use App\Models\BaseProduct;
use App\Models\Standard;
use App\Models\MapboxRecord;

use App\Scopes\TenantScope;
use Illuminate\View\View;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->where('verified', 0)
            ->whereIn('status', [0, 1])
            ->get();

        $all_locations = Location::all();

        $product_types = ProductType::latest()->paginate(10);
        $base_services = BaseService::latest()->paginate(10);
        $base_products = BaseProduct::latest()->paginate(10);
        $standards = Standard::latest()->paginate(10);


        //ddd($locations);
        return view('admin.dashboard', [
            'locations' => $locations,
            'all_locations' => $all_locations,
            'product_types' => $product_types,
            'base_services' => $base_services,
            'base_products' => $base_products,
            'standards' => $standards,


        ]);
    }

    public function insertLocation(Request $request, Location $location)
    {
        $mapboxRecord = new MapboxRecord;

        $locationAddress = "{$location->address}, {$location->zipcode} {$location->city}";
        $feature_id = strval($location->id);

        $tenant = $location->tenant->name;
        $name = $location->name;
        $description = $location->description;
        $opening_start = substr($location->opening_start, 0, 5);
        $opening_end = substr($location->opening_end, 0, 5);
        $location_type = $location->location_type->name;
        $lat = $location->lat;
        $lng = $location->lng;
        $active = $location->active;


        $mapboxRecord->tenant = $tenant;
        $mapboxRecord->location_id = $location->id;
        $mapboxRecord->name = $location->name;
        $mapboxRecord->description = $location->description;
        $mapboxRecord->address = $locationAddress;
        $mapboxRecord->opening_start = substr($location->opening_start, 0, 5);
        $mapboxRecord->opening_end = substr($location->opening_end, 0, 5);
        $mapboxRecord->location_type = $location_type;
        $mapboxRecord->lat = $lat;
        $mapboxRecord->lng = $lng;
        $mapboxRecord->active = $active;



        $locationData = [
            'id' => $feature_id,
            'type' => "Feature",
            'properties' => [
                'name' => $name,
                'description' => $description,
                'type'  => $location_type,
                'tenant' => $tenant,
                'opening_start' => $opening_start,
                'opening_end' => $opening_end,
                'address' => $locationAddress,
                'active' => $active,


            ],
            'geometry' => [
                'coordinates' => [$lng, $lat],
                'type' => "Point"
            ]
        ];

        dd($locationData);

        $mapboxRecord->data = json_encode($locationData);
        dd($mapboxRecord);

        $mapboxRecord->save();

        return back();
    }

    public function queueLocation(Request $request, Location $location)
    {
        PushToMapbox::dispatch($location)->onQueue('mapbox');

        $message = '' . $location->name . ' has been added to the Mapbox queue successfully, please be aware that there will be some time before your location appears online';

        $location->verified = 1;
        $location->status = 2;
        $location->save();

        return back()->with('message', $message);
    }

    public function disableLocation(Request $request, Location $location)
    {
        PushToMapbox::dispatch($location)->onQueue('mapbox');

        $message = '' . $location->name . ' has been added to the Mapbox queue successfully, please be aware that there will be some time before your location disappears online';

        $location->active = 0;

        $location->save();

        return back()->with('message', $message);
    }
}

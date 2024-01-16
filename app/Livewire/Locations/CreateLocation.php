<?php

namespace App\Livewire\Locations;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\Service;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\UI\WireUiComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;


class CreateLocation extends Component
{
    public $location;
    public $model;
    public $searchTerm;
    public $services = [];
    public $products = [];
    public $location_types;
    public $service_id = [];
    public $product_id = [];

    public $name;
    public $description;
    public $city;
    public $address;
    public $zipcode;
    public $lat;
    public $lng;

    public $opening_start;
    public $opening_end;
    public $opening_info;

    public $toggleMapButton = false;
    public $getCoordinatesButton = false;

    public $toggleMap = false;

    protected $listeners = ['coordinatesUpdated' => 'updateCoordinates', 'mapToggled' => 'toggleMap'];


    #[On('coordinatesUpdated')]
    public function updateCoordinates()
    {
        $lat = Cache::get('lat');
        $lng = Cache::get('lng');

    }


    public function openMap()
    {
        $this->dispatch('toggleMap');
    }

    public function mount(Location $location)
    {

        $this->location_types = LocationType::all();
        // $this->options = $this->location_types->pluck('name', 'id')->toArray();
    }

    public function updated()
    {
        $this->checkGetCoordinatesButton();
    }

    protected function checkGetCoordinatesButton()
    {
        if ($this->address && $this->zipcode && $this->city) {
            $this->getCoordinatesButton = true;
        }
    }

    public function updatedLat($lat)
    {
        if ($this->lngHasBeenUpdated()) {
            Cache::put('lat', $lat);
            $this->dispatch('coordinatesUpdated');
            $this->toggleMapButton = true;
        }
    }

    public function updatedLng($lng)
    {
        if ($this->latHasBeenUpdated()) {
            Cache::put('lng', $lng);
            $this->dispatch('coordinatesUpdated');
            $this->toggleMapButton = true;
        }
    }

    protected function latHasBeenUpdated()
    {
        return isset($this->lat) && $this->lat !== Cache::get('lat');
    }

    protected function lngHasBeenUpdated()
    {
        return isset($this->lng) && $this->lng !== Cache::get('lng');
    }

    public function getCoordinates(Request $request, Location $location)
    {
        $address = $this->address;
        $zipcode = $this->zipcode;
        $city = $this->city;

        $fullAddress = $address . ' ' . $zipcode . ' ' . $city;

        $token = 'sk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHB2MmVnYWwwMTZtMmtwOWRnMGg0MjBjIn0.FIatojtElq0bfLj8G9xVhw';

        $baseUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/';
        $addressEncoded = urlencode($fullAddress) . '.json';

        $url = "{$baseUrl}{$addressEncoded}?access_token={$token}";

        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data['features']) && count($data['features']) > 0) {
                    $coordinates = $data['features'][0]['geometry']['coordinates'];
                    $lat = $coordinates[1];
                    $lng = $coordinates[0];

                    $this->lat = $lat;
                    $this->lng = $lng;


                    Cache::put('lat', $lat);
                    Cache::put('lng', $lng);

                    $this->dispatch('coordinatesUpdated');
                    $this->toggleMapButton = true;
                }
            } else {
                dd($response);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return back();
    }

    public function submit()
    {

        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500',
            'location_type_id' => 'nullable',
            'service_id' => 'nullable',
            'product_id' => 'nullable',
            'lng' => 'nullable',
            'lat' => 'nullable',
            'address' => 'string|max:500',
            'zipcode' => 'integer|max:5',
            'city' => 'string|max:500',
            'opening_start' => 'time',
            'opening_end' => 'time',
            'opening_info' => 'string|max:500',

        ]);

        $this->location->name = $this->name;
        $this->location->description = $this->description;
        $this->location->city = $this->city;
        $this->location->address = $this->address;
        $this->location->zipcode = $this->zipcode;
        $this->location->opening_start = $this->opening_start;
        $this->location->opening_end = $this->opening_end;
        $this->location->opening_info = $this->opening_info;

        $this->location->lng = $this->lng;
        $this->location->lat = $this->lat;


        $this->service_id = $this->service_id;
        $this->product_id = $this->product_id;


        $location = Location::create($data);
        $location->save();

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location wurde erstellt');
    }

    public function getProducts(Request $request)
    {
        $selected = json_decode($request->get('selected', ''), true);

        return Product::query()
            ->when(
                $search = $request->get('search'),
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(!$search && $selected, function ($query) use ($selected) {
                $query->whereIn('id', $selected)
                    ->orWhere(function ($query) use ($selected) {
                        $query->whereNotIn('id', $selected)
                            ->orderBy('created_at');
                    });
            })
            ->limit(10)
            ->get()
            ->map(fn (Product $product) => $product->only('id', 'name'));
    }
    public function getServices(Request $request)
    {
        $selected = json_decode($request->get('selected', ''), true);

        return Service::query()
            ->when(
                $search = $request->get('search'),
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            )
            ->when(!$search && $selected, function ($query) use ($selected) {
                $query->whereIn('id', $selected)
                    ->orWhere(function ($query) use ($selected) {
                        $query->whereNotIn('id', $selected)
                            ->orderBy('created_at');
                    });
            })
            ->limit(10)
            ->get()
            ->map(fn (Service $service) => $service->only('id', 'name'));
    }

    public function render()
    {

        return view('livewire.locations.create-location', []);
    }
}

<?php

namespace App\Livewire\Locations;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\Service;
use App\Models\Product;
use App\Scopes\TenantScope;
use Livewire\Component;
use Illuminate\Http\Request;


class EditLocation extends Component
{

    public $location;
    public $options;

    public $services = [];
    public $products = [];
    public $service_id = [];
    public $product_id = [];

    public $location_types;

    public $name;
    public $description;
    public $city;
    public $address;
    public $zipcode;

    public $opening_start;
    public $opening_end;
    public $opening_info;

    public $allDay;




    public function mount(Location $location)
    {
        $this->location = $location;

        $this->name = $location->name;
        $this->description = $location->description;
        $this->city = $location->city;
        $this->address = $location->address;
        $this->zipcode = $location->zipcode;
        $this->service_id = json_decode($location->service_id);
        $this->product_id = json_decode($location->product_id);

        $this->opening_start = $location->opening_start;
        $this->opening_end = $location->opening_end;
        $this->opening_info = $location->opening_info;

        if ($this->opening_start == '00:00:00' && $this->opening_end == '00:00:00') {
            $this->allDay = true;
        } else {
            $this->allDay = false;
        }
        $this->location_types = LocationType::all();

        $this->options = $this->location_types->pluck('name', 'id')->toArray();
    }

    public function submit()
    {

        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
            'location_type_id' => 'nullable',
            'service_id' => 'nullable',
            'product_id' => 'nullable',
            'address' => 'string|max:500',
            'zipcode' => 'integer|max:5',
            'city' => 'string|max:500',
            'opening_start' => 'time',
            'opening_end' => 'time',
            'opening_info' => 'string|max:500',

            'lng' => 'nullable',
            'lat' => 'nullable',



        ]);
        $data['service_id'] = json_encode($this->value);
        $data['product_id'] = json_encode($this->value);

        $this->location->name = $this->name;
        $this->location->description = $this->description;
        $this->location->city = $this->city;
        $this->location->address = $this->address;
        $this->location->opening_start = $this->opening_start;
        $this->location->opening_end = $this->opening_end;
        $this->location->opening_info = $this->opening_info;
        $this->location->zipcode = $this->zipcode;
        $this->location->lng = $this->lng;
        $this->location->lat = $this->lat;
        $this->location->service_id = $this->service_id;
        $this->location->product_id = $this->product_id;


        $this->location->fresh();
        $this->location->save();

        return redirect()
            ->route('locations.index')
            ->with('message', 'Location wurde erstellt.');
    }


    public function toggleAllDay()
    {
        if ($this->allDay == true) {
            $this->opening_start = '00:00';
            $this->opening_end = '00:00';
        } else {
            $this->opening_start = '06:00';
            $this->opening_end = '22:00';
        }
    }

    public function getProducts(Request $request)
    {
        $selected = json_decode($request->get('selected', ''), true);



        return Product::withoutGlobalScope(TenantScope::class)
            ->when(
                $search = $request->get('search'),
                fn($query) => $query->where('name', 'like', "%{$search}%")
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
            ->map(fn(Product $product) => $product->only('id', 'name'));
    }
    public function getServices(Request $request)
    {
        $selected = json_decode($request->get('selected', ''), true);

        return Service::withoutGlobalScope(TenantScope::class)
            ->when(
                $search = $request->get('search'),
                fn($query) => $query->where('name', 'like', "%{$search}%")
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
            ->map(fn(Service $service) => $service->only('id', 'name'));
    }
    public function render()
    {
        return view('livewire.locations.edit-location');
    }
}

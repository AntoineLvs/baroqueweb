<?php

namespace App\Livewire\Admin;

use App\Models\Location;
use App\Models\MapboxRecord;
use App\Scopes\TenantScope;
use Livewire\Component;
use Illuminate\Http\Request;


class Dashboard extends Component
{
    public $locations;
    public $all_locations;
    public $toggleButton = false;

    public function toggleButton()
    {
        $this->toggleButton = !$this->toggleButton;

       
    }
    public function mount()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
        ->where(function ($query) {
            // Conditions pour les locations actives, non vérifiées et avec status 0 ou 1
            $query->where('active', 1)
                ->where('verified', 0)
                ->whereIn('status', [0, 1]);
        })
        ->orWhere(function ($query) {
            // Conditions pour les locations inactives, vérifiées et avec status 4
            $query->where('active', 0)
                ->where('verified', 1)
                ->where('status', 4);
        })
        ->get();

        $this->all_locations = Location::all();
    }

    public function insertLocation(Request $request)
    {
        dd('obé ?');

        $location = Location::find($request->id); 

        $mapboxRecord = new MapboxRecord();

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
        
        $location->verified = 1;
        $location->save();

        return back();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'locations' => $this->locations,
            'all_locations' => $this->all_locations,
        ]);
    }
}

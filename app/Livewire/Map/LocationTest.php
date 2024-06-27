<?php

namespace App\Livewire\Map;

use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationTest extends Component
{
    public $locationIds;
    public $locations;
    public $locationsGeoJson;

    protected $listeners = ['filterLocationOnMap'];

    public function filterLocationOnMap($locationsGeoJson)
    {
        $this->dispatch('geoJsonLocationOnMap', $locationsGeoJson);
    }

    public function mount()
    {
        $locations = Location::all();
        $this->locationsGeoJson = [
            'type' => 'FeatureCollection',
            'features' => $locations->map(function ($location) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$location->lng, $location->lat],
                    ],
                    'properties' => [
                        'title' => $location->name,
                        'description' => $location->description,
                        'id' => $location->id,
                        'opening_start' => $location->opening_start,
                        'opening_end' => $location->opening_end,
                        'active' => $location->active,
                        'product_id' => $location->product_id,
                    ]
                ];
            })->toArray()
        ];
        $this->dispatch('geoJsonLocationOnMap', $this->locationsGeoJson);
    }

    public function render()
    {
        return view('livewire.map.location-test', [
            'locationsGeoJson' => $this->locationsGeoJson
        ]);
    }
}

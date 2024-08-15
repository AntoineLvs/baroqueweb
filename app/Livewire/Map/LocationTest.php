<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationTest extends Component
{

    public $locationIds;
    public $locations;
    public $locationsGeoJson;

    protected $listeners = ['filterLocationOnMap'];

    public function filterLocationOnMap($locationIds)
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->whereIn('id', $locationIds)
            ->get(['lng', 'lat'])
            ->map(function ($location) {
                return [$location->lng, $location->lat];
            })
            ->toArray();

        $this->dispatch('geoJsonLocationOnMap', htmlspecialchars(json_encode($this->locations), ENT_QUOTES, 'UTF-8'));
    }

    public function mount()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->get(['lng', 'lat', 'name'])
            ->map(function ($location) {
                return [
                    'lng' => $location->lng,
                    'lat' => $location->lat,
                    'name' => $location->name,
                ];
            })
            ->toArray();

        $this->dispatch('initialData', json_encode($this->locations));
    }



    public function render()
    {
        return view('livewire.map.location-test', [
            'locations' => $this->locations
        ]);
    }
}
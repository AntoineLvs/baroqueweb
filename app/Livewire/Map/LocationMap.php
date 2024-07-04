<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationMap extends Component
{

    public $locationIds;
    public $locations;
    public $locationsGeoJson;

    protected $listeners = ['filterLocationOnMap'];

    public function filterLocationOnMap($locationIds)
    {
        $this->dispatch('recoistp', $locationIds);
    }


    public function mount()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->pluck('id')
            ->toArray();
        $this->locations = json_encode($this->locations);
        $this->dispatch('initialData', htmlspecialchars($this->locations, ENT_QUOTES, 'UTF-8'));
    }

    public function render()
    {
        return view('livewire.map.location-map', [
            'locations' => $this->locations
        ]);
    }
}

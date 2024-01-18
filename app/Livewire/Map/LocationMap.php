<?php

namespace App\Livewire\Map;

use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationMap extends Component
{

    public $locationIds;

    public function mount()
    {
        // Initialisez $locationIds avec les valeurs appropriées
        $this->locationIds = $this->getLocationIds();
        $this->dispatch('locations-loaded', ['locationIds' => $this->locationIds]);
    }
    public function render()
    {
        return view('livewire.map.location-map');
    }

    public function getLocationIds()
    {
        // Récupérez les ID des locations avec active = 1, verify = 1, et status = 2
        $locations = Location::where('active', 1)
            ->where('verified', 1)
            ->where('status', 2)
            ->pluck('id')
            ->toArray();

        return $locations;
    }

    public function hydrate()
    {
    }
}

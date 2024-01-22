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
     
    }
    public function render()
    {
        return view('livewire.map.location-map');
    }

    public function getLocationIds()
    {
        
    }

    public function hydrate()
    {
    }
}

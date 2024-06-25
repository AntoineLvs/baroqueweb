<?php

namespace App\Livewire\Map;

use App\Models\Location;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationTest extends Component
{

    public $locationIds;

    public function mount()
    {
     
    }
    public function render()
    {
        return view('livewire.map.location-test');
    }

    public function getLocationIds()
    {
        
    }

    public function hydrate()
    {
    }
}

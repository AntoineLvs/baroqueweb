<?php

namespace App\Livewire\Map;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateMap extends Component
{
    public $lat;
    public $lng;
    public $toggleMap = false;

    protected $listeners = ['coordinatesUpdated' => 'updateCoordinates', 'mapToggled' => 'toggleMap'];


    public function updateCoordinates()
    {
        $this->lat = Cache::get('lat');
        $this->lng = Cache::get('lng');
    }

    #[On('mapToggled')]
    public function toggleMap()
    {
        $this->toggleMap = True;
        $this->dispatch('toggleMap', [
            'latitude' => $this->lat,
            'longitude' => $this->lng,
        ]);
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.map.create_map', [
            'lat' => $this->lat,
            'lng' => $this->lng,
        ]);
    }
}

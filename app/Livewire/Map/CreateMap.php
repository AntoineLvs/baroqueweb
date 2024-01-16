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

  



    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.map.create_map');
    }
}

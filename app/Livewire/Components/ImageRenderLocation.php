<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ImageRenderLocation extends Component
{
    public $location;

    public function mount($location)
    {
        $this->location = $location;
    }

    public function render()
    {
        return view('livewire.components.image-render-location');
    }
}

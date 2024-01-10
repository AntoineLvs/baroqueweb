<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Pickaday extends Component
{
    public $date;

    public $saved = false;

    public $rules = [
        'date' => 'required|date',
    ];

    public function render()
    {
        return view('livewire.components.pickaday');
    }
}

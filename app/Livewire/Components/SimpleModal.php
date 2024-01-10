<?php

namespace App\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class SimpleModal extends Component
{
    public Model $model;

    public $field;

    public $data;

    public function mount()
    {
        // $this->data = $this->model->getAttribute($this->field);

        //ddd($this->data);
    }

    public function render()
    {
        return view('livewire.components.simple-modal');

    }
}

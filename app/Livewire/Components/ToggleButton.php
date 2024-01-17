<?php

namespace App\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{
    public Model $model;

    public string $field;

    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {

        return view('livewire.components.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

        if ($this->model->getTable() == 'locations' && $value == false && $this->model->getAttribute('verified') == 1) {

            $this->model->update(['status' => 4]);
        }
    }
}

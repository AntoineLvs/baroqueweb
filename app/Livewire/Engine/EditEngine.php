<?php

namespace App\Livewire\Engine;

use App\Models\Manufacturer;
use Livewire\Component;

class EditEngine extends Component
{
    public $name;
    public $data;
    public $engine;
    public $manufacturers = [];
    public $manufacturer_id;

    public function mount($engine)
    {

        $this->engine = $engine;

        $this->name = $engine->name;
        $this->data = $engine->data;

        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;
        $this->manufacturer_id = $engine->manufacturer->id;

    }

    public function render()
    {
        return view('livewire.engine.create-engine', [
            'manufacturers' => $this->manufacturers,
        ]);
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'string|max:500|nullable',
            'manufacturer_id' => 'required',
        ]);

        $this->engine->name = $this->name;
        $this->engine->data = $this->data;
        $this->engine->manufacturer_id = $this->manufacturer_id;
        $this->engine->fresh();
        $this->engine->save();

        return redirect()
            ->route('engines.index')
            ->with('message', 'Engine wurde aktualisiert.');

    }
}

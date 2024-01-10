<?php

namespace App\Livewire\Engine;

use App\Models\Engine;
use App\Models\Manufacturer;
use Livewire\Component;

class CreateEngine extends Component
{
    public $name;
    public $data;
    public $engine;
    public $manufacturers = [];
    public $manufacturer_id = 1;

    public function mount()
    {
        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'data' => 'string|max:500|nullable',
            'manufacturer_id' => 'required',
        ]);

        $engine = Engine::create($data);

        $engine->save();

        return redirect()
            ->route('engines.index')
            ->with('message', 'Engine wurde erstellt.');

    }

    public function render()
    {

        return view('livewire.engine.create-engine', [
            'manufacturers' => $this->manufacturers,
        ]);
    }
}

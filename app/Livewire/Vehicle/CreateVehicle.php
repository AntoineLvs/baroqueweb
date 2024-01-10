<?php

namespace App\Livewire\Vehicle;

use App\Models\Engine;
use App\Models\Manufacturer;
use App\Models\Vehicle;
use Livewire\Component;

class CreateVehicle extends Component
{
    public $name;
    public $description;

    public $engines = [];
    public $engine_id = 1;

    public $manufacturers = [];
    public $manufacturer_id = 1;

    public function mount()
    {
        $engines = Engine::all();
        $this->engines = $engines;

        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500|nullable',
            'engine_id' => 'required',
            'manufacturer_id' => 'required',
        ]);

        $vehicle = Vehicle::create($data);

        $vehicle->save();

        return redirect()
            ->route('vehicles.index')
            ->with('message', 'Vehicle wurde erstellt.');

    }

    public function render()
    {

        return view('livewire.vehicle.create-vehicle', [
            'engines' => $this->engines,
            'manufacturers' => $this->manufacturers,
        ]);
    }
}

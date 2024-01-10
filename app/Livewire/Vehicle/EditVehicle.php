<?php

namespace App\Livewire\Vehicle;

use App\Models\Engine;
use App\Models\Manufacturer;
use Livewire\Component;

class EditVehicle extends Component
{
    public $name;
    public $description;
    public $vehicle;
    public $engines = [];
    public $engine_id;
    public $manufacturers = [];
    public $manufacturer_id;

    public function mount($vehicle)
    {

        $this->vehicle = $vehicle;

        $this->name = $vehicle->name;
        $this->description = $vehicle->description;

        $engines = Engine::all();
        $this->engines = $engines;
        $this->engine_id = $vehicle->engine_id;

        $manufacturers = Manufacturer::all();
        $this->manufacturers = $manufacturers;
        $this->manufacturer_id = $vehicle->manufacturer_id;

    }

    public function render()
    {
        return view('livewire.vehicle.create-vehicle', [
            'engines' => $this->engines,
            'manufacturers' => $this->manufacturers,
        ]);
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500|nullable',
            'engine_id' => 'required',
            'manufacturer_id' => 'required',
        ]);

        $this->vehicle->name = $this->name;
        $this->vehicle->description = $this->description;
        $this->vehicle->engine_id = $this->engine_id;
        $this->vehicle->manufacturer_id = $this->manufacturer_id;

        $this->vehicle->fresh();
        $this->vehicle->save();

        return redirect()
            ->route('vehicles.index')
            ->with('message', 'Vehicle wurde aktualisiert.');

    }
}

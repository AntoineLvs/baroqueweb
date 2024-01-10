<?php

namespace App\Livewire\Manufacturer;

use App\Models\Manufacturer;
use Livewire\Component;

class CreateManufacturer extends Component
{
    public $name;

    public $contact;

    public function mount()
    {
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'contact' => 'string|max:500|nullable',
        ]);

        $manufacturer = Manufacturer::create($data);

        $manufacturer->save();

        return redirect()
            ->route('manufacturers.index')
            ->with('message', 'Manufacturer wurde erstellt.');

    }

    public function render()
    {
        return view('livewire.manufacturer.create-manufacturer');
    }
}

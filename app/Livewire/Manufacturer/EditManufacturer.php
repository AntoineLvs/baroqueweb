<?php

namespace App\Livewire\Manufacturer;

use Livewire\Component;

class EditManufacturer extends Component
{
    public $name;

    public $contact;

    public $manufacturer;

    public function mount($manufacturer)
    {

        $this->manufacturer = $manufacturer;

        $this->name = $manufacturer->name;
        $this->contact = $manufacturer->contact;

    }

    public function render()
    {
        return view('livewire.manufacturer.edit-manufacturer');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'contact' => 'string|max:500|nullable',
        ]);

        $this->manufacturer->name = $this->name;
        $this->manufacturer->contact = $this->contact;
        $this->manufacturer->fresh();
        $this->manufacturer->save();

        return redirect()
            ->route('manufacturers.index')
            ->with('message', 'Hersteller wurde aktualisiert.');

    }
}

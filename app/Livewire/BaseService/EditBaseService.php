<?php

namespace App\Livewire\BaseService;

use Livewire\Component;
use App\Models\BaseService;
use Livewire\WithFileUploads;


class EditBaseService extends Component
{

    use WithFileUploads;

    public $name;
    public $description;
    public $base_services;

    public function mount($base_services)
    {
        $this->base_services = $base_services;

        $this->name = $base_services->name;
        $this->description = $base_services->description;
    }


    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500',

        ]);


        $this->base_services->name = $this->name;
        $this->base_services->description = $this->description;
        $this->base_services->fresh();
        $this->base_services->save();

        return redirect()
            ->route('base-services.index')
            ->with('message', 'BaseService wurde aktualisiert.');
    }
    public function render()
    {
        return view('livewire.base-service.edit-base-service');
    }
}

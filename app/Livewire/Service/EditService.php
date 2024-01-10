<?php

namespace App\Livewire\Service;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BaseService;




class EditService extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $service;

    public $baseServices;
    public $base_service_id;

    public function mount($service)
    {
        $this->service = $service;

        $this->name = $service->name;
        $this->description = $service->description;

        $this->baseServices = BaseService::all();
        $this->base_service_id = BaseService::where('id', $service->base_service_id)->get()->first()->id;


    }


    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500',
            'base_service_id'=> 'nullable',


        ]);


        $this->service->name = $this->name;
        $this->service->description = $this->description;
        $this->service->base_service_id = $this->base_service_id;
        $this->service->fresh();
        $this->service->save();

        return redirect()
            ->route('services.index')
            ->with('message', 'Service wurde aktualisiert.');
    }

    public function render()
    {
        return view('livewire.service.edit-service');
    }
}

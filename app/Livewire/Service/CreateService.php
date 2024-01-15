<?php

namespace App\Livewire\Service;

use Livewire\Component;
use App\Models\Service;
use App\Models\BaseService;
use App\Scopes\TenantScope;

class CreateService extends Component
{

    public $name; 
    public $description;
    public $service;

    public $base_services;
    public $base_service_id;



    public function mount()
    {

      $this->base_services = BaseService::withoutGlobalScope(TenantScope::class)->get();

    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500',
            'base_service_id'=> 'nullable',

        ]);

        $service = Service::create($data);
        $service->fresh();
        $service->save();

        return redirect()
            ->route('services.index')
            ->with('message', 'Service wurde erstellt.');
    }

    public function render()
    {
        return view('livewire.service.create-service');
    }
}

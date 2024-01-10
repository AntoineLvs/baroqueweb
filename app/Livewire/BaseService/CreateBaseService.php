<?php

namespace App\Livewire\BaseService;

use Livewire\Component;
use App\Models\BaseService;


class CreateBaseService extends Component
{
    public $name;
    public $description;
    public $base_services;


    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'string|max:500',

        ]);

        $base_services = BaseService::create($data);
        $base_services->fresh();
        $base_services->save();

        return redirect()
            ->route('base-services.index')
            ->with('message', 'BaseService wurde erstellt.');
    }
    public function render()
    {
        return view('livewire.base-service.create-base-service');
    }
}

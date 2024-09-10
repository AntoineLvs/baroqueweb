<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationMap extends Component
{

    public $tenant_id;
    public $tenant;

    public function mount()
    {
        $this->tenant_id = session('tenant_id');
        $this->tenant = Tenant::where('id', $this->tenant_id)->pluck('name')->first();
       
    }

    public function render()
    {
        return view('livewire.map.location-map');
    }
}

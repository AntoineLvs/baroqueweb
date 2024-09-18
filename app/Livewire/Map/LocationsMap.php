<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationsMap extends Component
{

    public $tenant_id;
    public $tenant;

    public function mount($tenant_id)
    {
        $this->tenant_id = $tenant_id;
        $this->tenant = Tenant::where('id', $this->tenant_id)->pluck('name')->first();
    }

    public function render()
    {
        return view('livewire.map.locations-map');
    }
}

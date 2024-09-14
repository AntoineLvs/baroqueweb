<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleLocationMap extends Component
{

    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.map.single-location-map');
    }
}

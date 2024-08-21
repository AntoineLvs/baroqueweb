<?php

namespace App\Livewire\Map;

use App\Models\Location;
use App\Scopes\TenantScope;
use Livewire\Attributes\On;
use Livewire\Component;

class LocationTest extends Component
{
    public $locations;

    public function mount()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
            ->where('active', 1)
            ->pluck('id')
            ->toArray();

        $this->dispatch('initialData', json_encode($this->locations));
    }

    public function render()
    {
        return view('livewire.map.location-test', [
            'locations' => $this->locations
        ]);
    }
}

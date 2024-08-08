<?php

namespace App\Livewire\Admin;

use App\Models\Location;
use App\Models\MapboxRecord;
use App\Scopes\TenantScope;
use Livewire\Component;
use Illuminate\Http\Request;


class Dashboard extends Component
{
    public $locations;
    public $all_locations;
    public $toggleButton = false;

    public function toggleButton()
    {
        $this->toggleButton = !$this->toggleButton;

       
    }
    public function mount()
    {
        $this->locations = Location::withoutGlobalScope(TenantScope::class)
        ->where(function ($query) {
            // Conditions to get every location that has been created/edited and need to be pushed online
            $query->where('active', 1)
                ->where('verified', 0)
                ->whereIn('status', [0, 1]);
        })
        ->orWhere(function ($query) {
            // Conditions to get every location that is online, and need to be disable
            $query->where('active', 0)
                ->where('verified', 1)
                ->where('status', 4);
        })
        ->orWhere(function ($query) {
            //  Conditions to get every location that has been disabled, and need to be reactivate
            $query->where('active', 1)
                ->where('verified', 1)
                ->where('status', 5);
        })
        ->get();

        $this->all_locations = Location::all();
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'locations' => $this->locations,
            'all_locations' => $this->all_locations,
        ]);
    }
}

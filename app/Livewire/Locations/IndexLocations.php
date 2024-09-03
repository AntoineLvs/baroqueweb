<?php

namespace App\Livewire\Locations;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\Service;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\UI\WireUiComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;


class IndexLocations extends Component
{

    protected $listeners = [
        'locationActivated',
        'locationDeactivated',
    ];

    public function locationActivated()
    {
        session()->flash('message', 'Your request has been registered. Your Location will be checked by our team soon.');
    }

    public function locationDeactivated()
    {
        session()->flash('message', 'The location has been deactivated. Please be aware that it will take some time before it can be desactivated on map.');
    }

    public function mount()
    {
        // Mount something
    }
    public function render()
    {

        $locations = Location::whereNotIn('status', [6, 7, 17])->latest()->paginate(25);

        return view('livewire.locations.index-locations', [
            'locations' => $locations,
        ]);
    }
}

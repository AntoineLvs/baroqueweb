<?php

namespace App\Livewire\Locations;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use App\Models\Project;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;
use App\Scopes\TenantScope;


class ShowLocations extends Component
{
    use WithPagination;

    public $tenant;
    public $locations;

    public $products;
    public $services;

    public $product;
    public $location_id;

    public $location;

    public function mount($locations, $tenant, $services, $products)
    {
        $this->locations = $locations;
        $this->tenant = $tenant;
        $this->services = $services;
        $this->products = $products;
    }

    public function getServices($locationId)
    {
        $location = Location::withoutGlobalScope(TenantScope::class)->findOrFail($locationId);
        return $location->getServices();
    }


    public function render()
    {
        return view('livewire.locations.show-locations');
    }
}

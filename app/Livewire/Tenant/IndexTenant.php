<?php

namespace App\Livewire\Tenant;

use App\Models\ApiToken;
use App\Models\Location;
use App\Models\Tenant;
use App\Models\TokenType;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class IndexTenant extends Component
{
    public $tenants;
    public $locations_count;
    public $products;
    public $tenantId;
    public $apiToken;
    public $userStatus;
    public $tokenType;
    public $hasToken;
    public $daysRemaining;

    public $sortField = 'id';
    public $sortDirection = 'asc';


    public function mount()
    {
        // Récupérer tous les tenants
        $this->tenants = Tenant::all();

        foreach ($this->tenants as $tenant) {
            $tenant->locations_count = Location::where('tenant_id', $tenant->id)->count();

            $tenant->locations = Location::where('tenant_id', $tenant->id)->get();
            
            $allProducts = [];

            foreach ($tenant->locations as $location) {
                $location->products = $location->getProducts();

                foreach ($location->products as $product) {
                    $allProducts[$product->id] = $product;
                }
            }

            $allServices = [];
            foreach ($tenant->locations as $location) {
                $location->services = $location->getServices();
                foreach ($location->services as $service) {
                    $allServices[$service->id] = $service;
                }
            }

            $tenant->products = collect($allProducts)->values();
            $tenant->services = collect($allServices)->values();
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
            $this->sortField = $field;
        }

        if ($field === 'id') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->id;
            });
        } elseif ($field === 'name') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->name;
            });
        } elseif ($field === 'tenant_type') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->tenant_type->name;
            });
        } elseif ($field === 'contact') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->phone . $tenant->email;
            });
        } elseif ($field === 'address') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->street . $tenant->zip . $tenant->city . $tenant->country;
            });
        } elseif ($field === 'status') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->status;
            });
        } elseif ($field === 'api_calls_count') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->api_calls_count;
            });
        } elseif ($field === 'url_subsite') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->url_subsite;
            });
        } elseif ($field === 'description') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->description;
            });
        } elseif ($field === 'website') {
            $this->tenants = $this->tenants->sortBy(function ($tenant) {
                return $tenant->website;
            });
        }

        if ($this->sortDirection === 'desc') {
            $this->tenants = $this->tenants->reverse();
        }
    }


    public function render()
    {
        return view('livewire.tenant.index-tenant', [
            'tenants' => $this->tenants
        ]);
    }
}

<?php

namespace App\Livewire\Tenant;

use App\Models\Tenant;
use Livewire\Component;

class IndexTenant extends Component
{
    public $tenants = [];
    
    public $sortField = 'id';
    public $sortDirection = 'asc';


    public function mount()
    {
        $this->tenants = Tenant::all();
    }

    public function sortBy($field)
    {   
        if($this->sortField === $field)
        {            
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
        else
        {
            $this->sortDirection = 'asc';
            $this->sortField = $field;
        }

        if ($field === 'id')
        {
            $this->tenants = $this->tenants->sortBy(function($tenant)
            {
                return $tenant->id;
            });
        }
        elseif($field === 'name')
        {
            $this->tenants = $this->tenants->sortBy(function($tenant)
            {
                return $tenant->name;
            });
        }
        elseif($field === 'tenant_type')
        {
            $this->tenants = $this->tenants->sortBy(function($tenant)
            {
                return $tenant->tenant_type->name;
            });
        }
        elseif($field === 'contact')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->phone . $tenant->email;
        });
    }
    elseif($field === 'address')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->street . $tenant->zip . $tenant->city . $tenant->country;
        });
    }
    elseif($field === 'status')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->status;
        });
    }
    elseif($field === 'api_calls_count')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->api_calls_count;
        });
    }
    elseif($field === 'url_subsite')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->url_subsite;
        });
    }
    elseif($field === 'description')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->description;
        });
    }
    elseif($field === 'website')
    {
        $this->tenants = $this->tenants->sortBy(function($tenant)
        {
            return $tenant->website;
        });
    }

        if ($this->sortDirection === 'desc')
        {
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

<?php

namespace App\Livewire\Directory;

use App\Models\Product;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTenants extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $sortField = 'name';

    public $sortAsc = true;

    public $search = '';

    public $super;

    public $tenant;

    public $tenant_types;

    // public $tenant_types = [
    //     '1' => true,
    //     '2' => true,
    //     '3' => true,
    // ];

    public $dataTenantTypes = ['1', '2', '3'];

    public function updatedTypes()
    {
        if (! is_array($this->tenant_types)) {
            return;
        }

        $this->tenant_types = array_filter($this->tenant_types, function ($tenant_type) {
            return $tenant_type != false;
        });
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;

        } else {
            $this->super = true;
            $this->tenants = Tenant::all();
        }

        //  $count = Product::where('tenant_id','=',$id)->count();

    }

    public function render()
    {

        // $query = Tenant::search($this->search)
        // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

        $query = Tenant::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->when($this->tenant_types, function ($query, $tenant_types) {
                return $query->whereIn('tenant_type_id', $tenant_types);
            });

        //ddd($query->paginate($this->perPage));

        //   return view('livewire.register.show-tenants', [
        //     'tenants' => $query->paginate($this->perPage),
        //   ]);
        // }

        return view('livewire.directory.show-tenants', [
            'tenants' => $query->paginate($this->perPage),

        ]);
    }

    //   return view('livewire.register.show-tenants', [
    //     'tenants' => Tenant::whereLike('name', $this->search ?? '')->when($this->tenant_types, function($query, $tenant_types){
    //       return $query->whereIn('tenant_type', $tenant_types);
    //     }),
    //   ]);
    // }

}

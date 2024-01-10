<?php

namespace App\Livewire\Directory;

use App\Models\Location;
use App\Models\Product;
use App\Models\Project;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProfile extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $sortField = 'name';

    public $sortAsc = true;

    public $search = '';

    public $super;

    public $tenant;

    public $transmissions;

    public $dataTransmissions = ['1', '2'];

    public function updatedTransmissions()
    {
        if (! is_array($this->transmissions)) {
            return;
        }

        $this->transmissions = array_filter($this->transmissions, function ($transmission) {
            return $transmission != false;
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

    public function mount($tenant)
    {
        if (session()->has('tenant_id')) {
            $this->super = false;

        } else {
            $this->super = true;
            $this->tenants = Tenant::all();
        }

        $this->tenant = $tenant;
    }

    public function render()
    {

        // $query = Tenant::search($this->search)
        // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');

        $query = Tenant::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->when($this->transmissions, function ($query, $transmissions) {
                return $query->whereIn('transmission', $transmissions);
            });

        //ddd($query->paginate($this->perPage));

        //   return view('livewire.directory.show-tenants', [
        //     'tenants' => $query->paginate($this->perPage),
        //   ]);
        // }

        return view('livewire.directory.show-profile', [
            'tenant' => $query->paginate($this->perPage),
            'products' => Product::where('tenant_id', $this->tenant->id)->get(),
            'projects' => Project::where('tenant_id', $this->tenant->id)->get(),
            'locations' => Location::where('tenant_id', $this->tenant->id)->get(),
        ]);
    }

    //   return view('livewire.directory.show-tenants', [
    //     'tenants' => Tenant::whereLike('name', $this->search ?? '')->when($this->transmissions, function($query, $transmissions){
    //       return $query->whereIn('transmission', $transmissions);
    //     }),
    //   ]);
    // }

}

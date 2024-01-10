<?php

namespace App\Livewire\Hub;

use App\Models\Product;
use App\Models\ProductOfferInquiry;
use App\Models\PublicProductOffer;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Livewire\Component;
use Livewire\WithPagination;

class HubIndex extends Component
{
    use WithPagination;

    public $super;

    public $perPage = 10;

    public $sortField = 'id';

    public $sortAsc = true;

    public $search = '';

    public $tenant;

    public $offer;

    public $offerTypes;

    public $offerType;

    public $hubTypes;

    public $hubType;

    public $offerStatus;

    public $offerStates;

    public $dataHubTypes = ['1', '2', '3'];

    public $dataOfferTypes = ['1', '2', '3'];

    public $dataOfferStates = ['1', '2', '3'];

    public $simpleModal;

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;

        } else {
            $this->super = true;
            $this->tenants = Tenant::all();
        }
        //  $count = Product::where('tenant_id','=',$id)->count();

        // $this->offer_types = $dataOfferTypes;
    }

    public function updatedHubTypes()
    {
        if (! is_array($this->hubTypes)) {
            return;
        }

        $this->hubTypes = array_filter($this->hubTypes, function ($hubType) {
            return $hubType != false;
        });
    }

    public function updatedOfferTypes()
    {
        if (! is_array($this->offerTypes)) {
            return;
        }

        $this->offerTypes = array_filter($this->offerTypes, function ($offerType) {
            return $offerType != false;
        });
    }

    public function updatedOfferStates()
    {
        if (! is_array($this->offerStates)) {
            return;
        }

        $this->offerStates = array_filter($this->offerStates, function ($offerStatus) {
            return $offerStatus != false;
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

    public function getModel($modelId)
    {
        $model = ProductOffer::find($modelId);
        $this->informations = $model->informations;

        //...... this way you bind model data to properties
    }

    public function clickOpenModal($modelId)
    {
        $this->getModel($modelId);
        $this->dispatchBrowserEvent('openModal');
    }

    public function render()
    {
        // Q1
        $query = PublicProductOffer::search($this->search)
            ->where('active', 1)
            ->withoutGlobalScope(TenantScope::class)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->when($this->offerTypes, function ($query, $offerType) {
                return $query
                    ->whereIn('offer_type', $this->offerTypes);

            }
            )
            ->when($this->offerStates, function ($query, $offerStatus) {
                return $query
                    ->whereIn('offer_status', $this->offerStates);
            }
            );
        // END Q1

        // Q2
        $query2 = ProductOfferInquiry::search($this->search)
            ->where('active', 1)
            ->withoutGlobalScope(TenantScope::class)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->when($this->offerTypes, function ($query2, $offerType) {
                return $query2
                    ->whereIn('inquiry_type', $this->offerTypes);
            }
            );
        // END Q2

        return view('livewire.hub.hub-index', [
            'offers' => $query->paginate($this->perPage),
            'inquiries' => $query2->paginate($this->perPage),
        ]);
    }

    // public function render()
    //  {
    //    return view('livewire.hub.hub-index', [
    //      'offers' =>
    //      ProductOffer::withoutGlobalScope(TenantScope::class)
    //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
    //     ->whereLike('model', $this->search ?? '')
    //
    //        ->when($this->offerTypes, function ($query, $offerType) {
    //          return $query->where('offer_type', $offerType);
    //        })
    //        ->when($this->offerStates, function ($query, $offerStates) {
    //          return $query->whereIn('offer_status', $offerStatus);
    //        })
    //    ]);
    //  }

    //   return view('livewire.hub.hub-index', [
    //     'tenants' => Tenant::whereLike('name', $this->search ?? '')
    //     ->when($this->tenant_types, function($query, $tenant_types){
    //       return $query
    //       ->whereIn('tenant_type', $tenant_types);
    //     }),
    //   ]);
    //
    // }

}

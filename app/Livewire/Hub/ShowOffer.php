<?php

namespace App\Livewire\Hub;

use Livewire\Component;
use Livewire\WithPagination;

class ShowOffer extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $sortField = 'name';

    public $sortAsc = true;

    public $search = '';

    public $super;

    public $tenant;

    public $offer;

    public function mount($offer)
    {

        if (session()->has('tenant_id')) {
            $this->super = false;

        } else {
            $this->super = true;

        }

        $this->offer = $offer;

    }

    public function render()
    {

        return view('livewire.hub.show-offer');

        // return view('livewire.hub.show-offer', [
        //   'offer' => $offer,
        //
        // ]);

    }
}

<?php

namespace App\Livewire\Hub;

use Livewire\Component;
use Livewire\WithPagination;

class ShowInquiry extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $sortField = 'name';

    public $sortAsc = true;

    public $search = '';

    public $super;

    public $tenant;

    public $offer;

    public function mount($inquiry)
    {

        if (session()->has('tenant_id')) {
            $this->super = false;

        } else {
            $this->super = true;

        }

        $this->inquiry = $inquiry;

    }

    public function render()
    {

        return view('livewire.hub.show-inquiry');

    }
}

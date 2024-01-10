<?php

namespace App\Livewire\Components;

use Livewire\Component;

class MobileMenu extends Component
{
    public $super;

    public $showAdminLinksMobile;

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;
        } else {
            $this->super = true;
        }
        $this->showAdminLinksMobile = false;
    }

    public function render()
    {
        return view('livewire.components.mobile-menu');
    }
}

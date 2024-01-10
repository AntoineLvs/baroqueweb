<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;

class AppSidebar extends Component
{
    public $super;

    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;
        } else {
            $this->super = true;
        }
    }

    public function render()
    {
        return view('livewire.sidebar.app-sidebar');
    }
}

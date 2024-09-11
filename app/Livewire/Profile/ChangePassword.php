<?php

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserPassword;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{




    public function render()
    {
        return view('livewire.profile.change-password');
    }
}

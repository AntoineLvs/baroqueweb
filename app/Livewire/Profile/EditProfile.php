<?php

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditProfile extends Component
{
    public $state = [];

    public $current_password;
    public $password;
    public $password_confirmation;


    public function render()
    {
        return view('livewire.profile.edit-profile');
    }

    public function mount()
    {

        $this->state = auth()->user()->withoutRelations()->toArray();

    }

    //USES FORTIFY
    public function updateProfileInformation(UpdateUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(auth()->user(), $this->state);

        session()->flash('message', 'Profile successfully updated');
    }




}

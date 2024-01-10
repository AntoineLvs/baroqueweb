<?php

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserProfileInformation;
use Livewire\Component;

class EditProfile extends Component
{
    public $state = [];

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
        //  ddd(auth()->user()->Tenant->name);

        $this->resetErrorBag();

        //ddd($this->state);

        $updater->update(auth()->user(), $this->state);

        //auth()->user()->Tenant->name = $this->state['tenant_name'];

        session()->flash('status', 'Profile successfully updated');
    }
}

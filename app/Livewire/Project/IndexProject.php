<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class IndexProject extends Component
{

    protected $listeners = [
        'entityActivated',
        'entityDeactivated',
    ];

    public function projectActivated()
    {
        session()->flash('message', 'Your request has been registered. Your Project will be checked by our team soon.');
    }

    public function projectDeactivated()
    {
        session()->flash('message', 'The project has been deactivated. Please be aware that it will take some time before it can be desactivated on map.');
    }

    public function mount()
    {
        // Mount something
    }
    public function render()
    {

        $projects = Project::latest()->paginate(25);

        return view('livewire.project.index-project', [
            'projects' => $projects,
        ]);
    }
}

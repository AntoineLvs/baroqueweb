<?php

namespace App\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectType;
use Livewire\Component;

class CreateProject extends Component
{
    public $project;
    public $project_types;

    public $name;
    public $description;
    public $status;
    public $client_id;
    public $project_type_id;

    public $clients;

    public function mount()
    {
        $this->project_types = ProjectType::all();
        $this->clients = Client::all();

    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'project_type_id' => 'string|max:100|nullable',
            'client_id' => 'string|max:100|nullable',

        ]);


        
        $project = Project::create($data);

        $project->save();

        return redirect()
            ->route('projects.index')
            ->with('message', 'Project was created.');
    }

    public function render()
    {
        return view('livewire.project.create-project', [
            'project_types' => $this->project_types,
        ]);
    }
}

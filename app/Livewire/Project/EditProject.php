<?php

namespace App\Livewire\Project;

use App\Models\ProjectType;
use Livewire\Component;

class EditProject extends Component
{
    public $project;

    public $name;
    public $description;
    public $status;
    public $project_type_id;

    public $project_types;

    public function mount($project)
    {

        $this->project = $project;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->project_type_id = $project->project_type_id;

        $this->project_types = ProjectType::all();
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'project_type_id' => 'string|max:100|nullable',

        ]);

        $this->project->name = $this->name;
        $this->project->description = $this->description;
        $this->project->status = $this->status;
        $this->project->project_type_id = $this->project_type_id;

        $this->project->fresh();
        $this->project->save();

        return redirect()
            ->route('projects.edit', $this->project)
            ->with('message', 'Project has been updated.');
    }
    public function render()
    {
        return view('livewire.project.edit-project', [
            'project_types' => $this->project_types,
        ]);
    }
}

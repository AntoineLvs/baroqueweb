<?php

namespace App\Livewire\Project;

use App\Models\ProjectType;
use App\Models\Project;
use App\Models\Task;
use App\Scopes\TenantScope;
use Livewire\Component;

class ShowProject extends Component
{
    public $project;

    public $name;
    public $description;
    public $status;
    public $project_type_id;
    public $project_type;

    public $project_types;

    public $tasks;

    public function mount($project)
    {

        $this->project = $project;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->project_type_id = $project->project_type_id;

        $this->project_type = ProjectType::find($project->project_type_id);

        $this->tasks = Task::withoutGlobalScope(TenantScope::class)->where('project_id', $project->id)->get();
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
            ->route('projects.show', $this->project)
            ->with('message', 'Project has been updated.');
    }
    public function render()
    {
        return view('livewire.project.show-project');
    }
}

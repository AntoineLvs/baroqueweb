<?php

namespace App\Livewire\Task;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskType;
use Livewire\Component;

class CreateTask extends Component
{
    public $task;

    public $name;
    public $description;
    public $status;
    public $timer;
    public $project_id;

    public $projects;

    public function mount()
    {
        $this->projects = Project::all();

    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'project_id' => 'string|max:100|nullable',
            'timer' => 'string|max:100|nullable',

        ]);


        
        $task = Task::create($data);

        $task->save();

        return redirect()
            ->route('tasks.index')
            ->with('message', 'Task was created.');
    }

    public function render()
    {
        return view('livewire.task.create-task', [
            'projects' => $this->projects,
        ]);
    }
}

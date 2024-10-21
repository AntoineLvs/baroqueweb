<?php

namespace App\Livewire\Task;

use App\Models\TaskType;
use App\Models\Task;
use App\Scopes\TenantScope;
use Livewire\Component;

class ShowTask extends Component
{
    public $task;

    public $name;
    public $description;
    public $status;
    public $timer;

    public function mount($task)
    {

        $this->task = $task;

        $this->name = $task->name;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->timer = $task->timer;


    }

    
    public function render()
    {
        return view('livewire.task.show-task');
    }
}

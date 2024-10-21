<?php

namespace App\Livewire\Task;

use App\Models\TaskType;
use Livewire\Component;

class EditTask extends Component
{
    public $task;

    public $name;
    public $description;
    public $status;


    public function mount($task)
    {

        $this->task = $task;

        $this->name = $task->name;
        $this->description = $task->description;
        $this->status = $task->status;

    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'string|max:500|nullable',
            'description' => 'string|max:500|nullable',
            'status' => 'string|max:500|nullable',
            'task_type_id' => 'string|max:100|nullable',

        ]);

        $this->task->name = $this->name;
        $this->task->description = $this->description;
        $this->task->status = $this->status;
        $this->task->task_type_id = $this->task_type_id;

        $this->task->fresh();
        $this->task->save();

        return redirect()
            ->route('tasks.edit', $this->task)
            ->with('message', 'Task has been updated.');
    }
    public function render()
    {
        return view('livewire.task.edit-task', [
            'task_types' => $this->task_types,
        ]);
    }
}

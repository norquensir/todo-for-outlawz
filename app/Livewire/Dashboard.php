<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Livewire\Component;

class Dashboard extends Component
{
    public CreateTask $formCreateTask;

    public function render()
    {
        return view('livewire.dashboard')->with([
            'tasks' => Task::query()->orderBy('is_completed')->oldest()->get(),
        ]);
    }

    public function createTask(Request $request)
    {
        $this->formCreateTask->store();
    }

    public function completeTask(string $taskUuid, bool $complete)
    {
        $task = Task::findByUuid($taskUuid);

        if (!empty($task)) {
            $task->is_completed = $complete;
            $task->save();
        }
    }

    public function deleteTask(string $taskUuid)
    {
        $task = Task::findByUuid($taskUuid);

        if (!empty($task)) {
            $task->delete();
        }
    }
}

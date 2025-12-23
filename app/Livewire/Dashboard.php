<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateTask;
use App\Livewire\Forms\EditTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Livewire\Component;

class Dashboard extends Component
{
    public CreateTask $formCreateTask;

    public EditTask $formEditTask;

    public ?string $editingTaskUuid = null;

    public function render()
    {
        return view('livewire.dashboard')->with([
            'tasks' => Task::query()
                ->orderBy('is_completed')
                ->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
                ->oldest()
                ->get(),
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

    public function openEditTask(string $taskUuid)
    {
        $task = Task::findByUuid($taskUuid);

        if (!empty($task)) {
            $this->editingTaskUuid = $taskUuid;
            $this->formEditTask->setTask($task);
            $this->dispatch('open-edit-modal');
        }
    }

    public function updateTask()
    {
        $this->formEditTask->update();
        $this->editingTaskUuid = null;
        $this->dispatch('close-edit-modal');
    }

    public function cancelEdit()
    {
        $this->editingTaskUuid = null;
        $this->dispatch('close-edit-modal');
    }
}

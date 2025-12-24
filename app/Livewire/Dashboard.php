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

    public string $search = '';

    public string $filterStatus = 'all';

    public string $filterPriority = 'all';

    public string $filterDeadline = 'all';

    public function render()
    {
        $query = Task::query();

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply status filter
        if ($this->filterStatus === 'completed') {
            $query->where('is_completed', true);
        } elseif ($this->filterStatus === 'pending') {
            $query->where('is_completed', false);
        }

        // Apply priority filter
        if ($this->filterPriority !== 'all') {
            $query->where('priority', $this->filterPriority);
        }

        // Apply deadline filter
        if ($this->filterDeadline === 'today') {
            $query->whereDate('deadline', today());
        } elseif ($this->filterDeadline === 'week') {
            $query->whereBetween('deadline', [now(), now()->addWeek()]);
        } elseif ($this->filterDeadline === 'overdue') {
            $query->where('is_completed', false)
                ->where('deadline', '<', now());
        }

        $tasks = $query->orderBy('is_completed')
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")
            ->oldest()
            ->get();

        // Calculate statistics
        $allTasks = Task::query()->get();
        $stats = [
            'total' => $allTasks->count(),
            'completed' => $allTasks->where('is_completed', true)->count(),
            'pending' => $allTasks->where('is_completed', false)->count(),
            'overdue' => $allTasks->filter(fn($task) => $task->isDue())->count(),
            'completionRate' => $allTasks->count() > 0
                ? round(($allTasks->where('is_completed', true)->count() / $allTasks->count()) * 100)
                : 0,
        ];

        return view('livewire.dashboard')->with([
            'tasks' => $tasks,
            'stats' => $stats,
        ]);
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->filterStatus = 'all';
        $this->filterPriority = 'all';
        $this->filterDeadline = 'all';
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

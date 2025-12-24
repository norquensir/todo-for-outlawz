<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Form;

class EditTask extends Form
{
    public ?Task $task;

    public string $title = '';

    public string|null $description = '';

    public string|null $deadline = '';

    public string $priority = 'medium';

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description ?? '';
        $this->deadline = $task->deadline?->format('Y-m-d\TH:i') ?? '';
        $this->priority = $task->priority;
    }

    public function update()
    {
        if (empty($this->title)) {
            return;
        }

        $this->task->title = $this->title;
        $this->task->description = $this->description ?? null;
        $this->task->deadline = $this->deadline ?? null;
        $this->task->priority = $this->priority;
        $this->task->save();
    }
}

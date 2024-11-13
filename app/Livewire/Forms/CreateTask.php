<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Form;

class CreateTask extends Form
{
    public string $title;

    public string|null $description;

    public string|null $deadline;

    public function store()
    {
        if (empty($this->title)) {
            return;
        }

        $task = new Task();
        $task->title = $this->title;
        $task->description = $this->description ?? null;
        $task->deadline = $this->deadline ?? null;
        $task->save();
    }
}

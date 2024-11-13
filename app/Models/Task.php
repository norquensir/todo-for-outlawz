<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public static function findByUuid(string $taskUuid): Task|null
    {
        return Task::query()->where('uuid', $taskUuid)->first();
    }

    public function isDue(): bool
    {
        return empty($this->completed_at) && !empty($this->deadline) && $this->deadline->isPast();
    }
}

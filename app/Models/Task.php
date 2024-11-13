<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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
        static::addGlobalScope('check_owner', function (Builder $builder) {
            $builder->where('user_id', Auth::id());
        });

        self::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->user_id = Auth::id();
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

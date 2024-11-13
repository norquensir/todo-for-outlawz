<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasUuid;

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
            $model->user_id = Auth::id();
        });
    }

    public function isDue(): bool
    {
        return empty($this->completed_at) && !empty($this->deadline) && $this->deadline->isPast();
    }
}

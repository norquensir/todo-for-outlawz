<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public static function findByUuid(string $taskUuid): Model|null
    {
        return self::query()->where('uuid', $taskUuid)->first();
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}

<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasUuid;

    protected function calendarName(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => empty($value) ? 'Taken van ' . $this->name : $value,
        );
    }
}

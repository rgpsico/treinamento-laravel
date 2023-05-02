<?php

// app/Traits/UserFilters.php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserFilters
{
    public function scopeGetUserBy(Builder $query, $field, $value)
    {
        return $query->where($field, $value);
    }
}

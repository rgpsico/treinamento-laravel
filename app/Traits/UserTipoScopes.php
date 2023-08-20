<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserTipoScopes
{
    public function scopeUsuariosAtivosPorTipo(Builder $query, $tipo = 2)
    {
        return $query->whereHas('userTipos', function (Builder $query) use ($tipo) {
            $query->where('users_tipo.id', $tipo);
        })->where('status', 1);
    }
}

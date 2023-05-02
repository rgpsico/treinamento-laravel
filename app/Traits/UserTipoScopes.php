<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait UserTipoScopes
{
    public function scopeUsuariosAtivosPorTipo(Builder $query, $tipo)
    {
        return $query->whereHas('userTipos', function (Builder $query) use ($tipo) {
            $query->where('users_tipo.nome', $tipo);
        })->where('status', 1);
    }
}

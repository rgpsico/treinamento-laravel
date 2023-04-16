<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'users_tipo';

    protected $fillable = ['id', 'nome'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function userTipoUsers()
    {
        return $this->hasMany(UserTipoUser::class);
    }
}

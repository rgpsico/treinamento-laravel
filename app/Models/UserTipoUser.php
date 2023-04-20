<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTipoUser extends Model
{
    use HasFactory;

    protected $table = 'users_tipo_users';
    protected $fillable = ['tipo_usuario_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userType()
    {
        return $this->belongsTo(TipoUsuario::class);
    }
}

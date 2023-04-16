<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTipoUser extends Model
{
    use HasFactory;

    protected $table = 'users_tipo_users';
    protected $fillable = ['tipo_usuario_id', 'user_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tipo_user')->withTimestamps();
    }
}

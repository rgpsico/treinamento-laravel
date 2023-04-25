<?php

namespace app\Modulos\Entregadores\Models;

use Illuminate\Database\Eloquent\Model;

class Entregadores extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'status'
    ];
}

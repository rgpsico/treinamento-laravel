<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'userdata';

    protected $fillable = [
        'user_id', 'rg', 'cpf',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

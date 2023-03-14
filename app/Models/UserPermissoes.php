<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePermissoes extends Model
{

    use HasFactory;

    protected $table = 'users_permissoes';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

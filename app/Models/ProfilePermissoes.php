<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePermissoes extends Model
{

    use HasFactory;

    protected $table = 'profile_permissoes';

    public $timestamps = false;

    public function permissoes()
    {
        return $this->hasMany(Permissoes::class, 'id', 'permission_id');
    }
}

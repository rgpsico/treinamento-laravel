<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileUser extends Model
{

    use HasFactory;

    protected $table = 'profile_users';

    public $timestamps = false;


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function permissoes()
    {
        return $this->hasMany(ProfilePermissoes::class, 'profile_id')
            ->join('permissoes', 'permissoes.id', '=', 'profile_permissoes.permission_id')
            ->select('permissoes.name as nome');
    }
}

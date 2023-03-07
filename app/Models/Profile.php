<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    protected $table = 'profile';

    public $timestamps = false;

    public function permissoes()
    {
        return $this->belongsToMany(Permission::class, 'profile_permissoes');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissaoUser extends Model
{
    protected $fillable = ['user_id', 'permission_id'];

    use HasFactory;

    protected $table = 'permissoes_users';

    public $timestamps = true;

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function permissao()
    {
        return $this->belongsTo(Permissoes::class, 'permission_id', 'id');
    }
}

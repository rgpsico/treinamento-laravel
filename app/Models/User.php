<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
    }

    public function gallery()
    {
        return $this->hasMany(UserGallery::class);
    }


    public function permissoesUser()
    {
        return $this->hasMany(PermissaoUser::class, 'user_id', 'id');
    }

    public function tiposUsuarios()
    {
        return $this->belongsToMany(TipoUsuario::class);
    }

    public function tiposUsuario()
    {
        return $this->belongsToMany(TipoUsuario::class, 'users_tipo_users');
    }


    public function temPermissao($nomePermissao)
    {
        foreach ($this->permissoesUser as $permissaoUser) {
            if ($permissaoUser->permissao->name === $nomePermissao) {
                return true;
            }
        }

        return false;
    }

    public function endereco()
    {
        return $this->hasOne(UserEndereco::class, 'user_id', 'id');
    }

    public function itens()
    {
        return $this->hasOne(Itens::class, 'user_id', 'id');
    }
}

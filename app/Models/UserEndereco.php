<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class UserEndereco extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'user_endereco';

    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'cidade',
        'estado'
    ];

    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

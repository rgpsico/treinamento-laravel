<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class UserEndereco extends Model
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

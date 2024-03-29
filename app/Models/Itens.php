<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;


    protected $fillable = ['imovel_id', 'item', 'quantidade'];

    public function User()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}

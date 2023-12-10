<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $table = 'profissional';
    protected $fillable = [
        'user_id', 'especialidade', 'sobre', 'facebook', 'instagran', 'experiencia', 'endereco',
        'status', 'tipo',   'titulo'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco()
    {
        return $this->belongsTo(UserEndereco::class);
    }
}

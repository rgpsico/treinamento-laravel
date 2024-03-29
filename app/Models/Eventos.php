<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'data_evento',
        'local',
        'capacidade'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    use HasFactory;
    protected $table = 'comercio';
    protected $fillable = ['nome', 'endereco', 'telefone', 'status', 'avatar'];
}

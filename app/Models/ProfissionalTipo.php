<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissionalTipo extends Model
{
    use HasFactory;

    protected $table = 'profissional_tipo';

    protected $fillable =  ['nome', 'descricao'];

    public function profissionais()
    {
        return $this->hasMany(Profissional::class, 'tipo_id');
    }
}

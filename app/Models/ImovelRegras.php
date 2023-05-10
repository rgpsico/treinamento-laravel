<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelRegras extends Model
{
    use HasFactory;

    protected $table = 'imovel_regras';

    protected $fillable = ['regra_id', 'imovel_id'];

    public function Imovel()
    {
        return $this->belongsTo(Imovel::class);
    }

    public function regras()
    {
        return $this->hasOne(Regras::class, 'id', 'regra_id');
    }
}

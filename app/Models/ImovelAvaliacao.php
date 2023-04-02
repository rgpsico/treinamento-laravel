<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelAvaliacao extends Model
{
    use HasFactory;

    protected $table = 'imovel_avaliacao';

    protected $fillable =  ['imovel_id', 'avaliacao'];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}

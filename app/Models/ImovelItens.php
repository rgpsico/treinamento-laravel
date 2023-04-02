<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelItens extends Model
{
    use HasFactory;

    protected $table = 'imovel_itens';

    protected $fillable = ['item_id', 'imovel_id'];

    public function Imovel()
    {
        return $this->belongsTo(Imovel::class);
    }

    public function itens()
    {
        return $this->belongsTo(Itens::class, 'item_id');
    }

    public function hastem($id)
    {

        return $item = Itens::find($id)->all();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable =  ['title', 'description', 'price', 'type', 'address', 'user_id', 'status', 'status_admin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gallery()
    {
        return $this->hasMany(UserGallery::class);
    }

    public function itens()
    {
        return $this->hasMany(ImovelItens::class);
    }

    public function regras()
    {
        return $this->hasMany(RegraImovel::class);
    }

    public function listaEspera()
    {
        return $this->hasMany(ListaEsperaImovel::class);
    }

    public function avaliacoes()
    {
        return $this->hasMany(ImovelAvaliacao::class);
    }
}

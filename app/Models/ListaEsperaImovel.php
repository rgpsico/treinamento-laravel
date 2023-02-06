<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListaEsperaImovel extends Model
{
    use HasFactory;
    protected $table = 'imovel_espera_users';
    protected $fillable = ['user_id' , 'imovel_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function imovel()
    {
        return $this->hasMany(Imovel::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissoes extends Model
{
    protected $fillable = ['name', 'label', 'categoria_id'];

    use HasFactory;

    protected $table = 'permissoes';

    public $timestamps = true;

    public function categoria()
    {
        return $this->hasOne(PermissoesCategoria::class, 'id', 'categoria_id');
    }
}

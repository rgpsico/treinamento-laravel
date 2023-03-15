<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissoesCategoria extends Model
{
    protected $fillable = ['name'];

    use HasFactory;

    protected $table = 'permissoes_categoria';

    public $timestamps = true;

    public function permisssoes()
    {
        return $this->hasMany(Permisssoes::class);
    }
}

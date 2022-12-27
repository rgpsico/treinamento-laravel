<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    
    protected $table = 'imoveis';

    protected $filliable =  ['title', 'description', 'price', 'type', 'address', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gallery()
    {
        return $this->hasMany(UserGallery::class);
    }
}

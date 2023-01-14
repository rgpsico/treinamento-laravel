<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    use HasFactory;

    protected $table = 'userGallery';

    protected $fillable = [
        'image',
        'user_id',
        'imovel_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

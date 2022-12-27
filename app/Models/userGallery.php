<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userGallery extends Model
{
    use HasFactory;

    protected $table = 'userdata';

    protected $fillable = [
        'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

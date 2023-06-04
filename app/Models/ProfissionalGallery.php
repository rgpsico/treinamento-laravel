<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissionalGallery extends Model
{
    use HasFactory;

    protected $table = 'profissional_gallery';
    protected $fillable = ['user_id', 'image', 'type'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_products', 'product_id', 'user_id')->withTimestamps();
    }
}

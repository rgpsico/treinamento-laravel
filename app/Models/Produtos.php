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
        'comercio_id'
    ];

    public function scopeDoUsuario($query, $usuarioId)
    {
        return $query->whereHas('users', function ($query) use ($usuarioId) {
            $query->where('users.id', $usuarioId);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_products', 'product_id', 'user_id')->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(ProductsImagens::class, 'product_id');
    }

    public function comercio()
    {
        return $this->belongsTo(Comercio::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProdutos extends Model
{
    use HasFactory;

    protected $table = 'users_products';

    protected $fillable = ['product_id', 'user_id', 'quantity'];
}

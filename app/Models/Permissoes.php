<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissoes extends Model
{
    protected $fillable = ['name'];
    
    use HasFactory;
    
    protected $table = 'permissoes';

    public $timestamps = true;


   
}

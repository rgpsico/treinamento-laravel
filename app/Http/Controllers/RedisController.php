<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
   public function index()
   {
      return Cache::remember('imovel', 60, function () {
       Imovel::all();
    });
   }
}

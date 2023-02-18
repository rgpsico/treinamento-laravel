<?php

namespace App\Modulos\Entregadores\Http\Controllers;

use App\Http\Controllers\Controller;

class MeuController extends Controller
{
    public function index()
    {
        return view('entregadores::index');
    }
}

<?php

namespace App\Modulos\Entregadores\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modulos\Entregadores\Models\Entregadores;

class MeuController extends Controller
{

    public function index()
    {
        $entregadores = Entregadores::all();

        return view('entregadores::index', [
            'users' =>  $entregadores
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $totalImoveis = Imovel::where('user_id', $user->id)->count();
        return view('dashboard.index', [
            'totalImovel' => $totalImoveis
        ]);
    }

    public function store()
    {
        $imovel = Imovel::all();
    }
}

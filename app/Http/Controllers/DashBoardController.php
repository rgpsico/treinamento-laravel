<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $totalImoveis = $user->imoveis()->count();
        return view('dashboard.index',[
            'totalImovel' => $totalImoveis 
        ]
    
    );
    }
}

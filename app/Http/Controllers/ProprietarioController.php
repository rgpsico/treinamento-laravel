<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    protected $model;

    public function __construct(User $model )
    {
        $this->model = $model;
        
    }
    public function index()
    {
        $model = $this->model::all(['id','name']);
        return view('imovel.proprietarios.index')->with(['model' => $model]);
    }
}

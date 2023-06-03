<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{

    protected $pageTitle = 'Profissionais';
    protected $view = 'profissionais';
    protected $route = 'profissionais';
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listar()
    {

        $model = $this->model::all();
        return view($this->view . '.list', compact('model'));
    }
}

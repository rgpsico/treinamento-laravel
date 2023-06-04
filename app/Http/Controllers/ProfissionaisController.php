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

    public function profissional($id)
    {
        $model = $this->model::where('id', $id)->first();
        return view($this->view . '.profile', [
            'model' => $model
        ]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
        ]);


        $user = User::findOrFail($request->user_id);

        $user->update([
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        $professional = $user->profissional()->firstOrCreate([]);


        $professional->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'instragan' => $request->instragan,
            'facebook' => $request->facebook,
            'sobre' => $request->sobre,

        ]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProprietarioController extends Controller
{
    protected $model;
    protected $pageTitle = 'Proprietário';

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $pageTitle = $this->pageTitle;
        $model = $this->model::all(['id', 'name']);
        return view('imovel.proprietarios.index')->with(['model' => $model, 'pageTitle' => $pageTitle]);
    }

    public function create()
    {

        return view('imovel.proprietarios.create');
    }

    public function edit($id)
    {
        $model = User::find($id);
        return view('imovel.proprietarios.create', compact('model'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make('123456');
        $user->save();

        return redirect()->route('proprietario.create')
            ->with(['success' => 'Propietario criado com sucesso']);
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make('123456');

        $user->save();
        return redirect()->route('proprietario.edit', ['id' => $id])
            ->with(['success' => 'Propietario Atualizado  com sucesso']);;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('proprietario.index')
            ->with(['success' => 'Propietario Excluido  com sucesso']);;
    }
}

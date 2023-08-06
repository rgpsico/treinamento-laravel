<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    protected $model;
    protected $pageTitle = 'Itens';

    public function __construct(Eventos $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model = $this->model::all(['id', 'name', 'descricao']);
        $pageTitle = $this->pageTitle;
        return view('imovel.itens.index')->with(['model' => $model, 'pageTitle' => $pageTitle]);
    }

    public function create()
    {

        return view('imovel.itens.create');
    }

    public function edit($id)
    {

        if ($model = $this->model->where('id', $id)->first()) {
            return view('imovel.itens.create', compact('model'));
        }
    }

    public function update(Request $request, $id)
    {

        $model = $this->model::findOrFail($id); // Busca o model pelo ID ou lança uma exceção se não encontrá-lo
        $model->name = $request->name;
        $model->descricao = $request->descricao;
        $model->save();

        return redirect()->back()
            ->with('success', 'Item atualizado com sucesso.');
    }


    public function store(Request $request)
    {

        $item = $this->model;
        $item->name = $request->name;
        $item->descricao = $request->descricao;
        $item->save();

        return redirect()->route('itens.index')
            ->with('success', 'Item  criado com sucesso.');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => 'Item deleteado com sucesso']);
    }
}

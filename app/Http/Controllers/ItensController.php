<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;


class ItensController extends Controller
{
    protected $model;
    protected $pageTitle = 'Itens';

    public function __construct(Itens $model)
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
        $model = $this->model->where('id', $id)->first();

        return view('imovel.itens.create', compact('model'));
    }

    public function update(Request $request, $id)
    {

        $model = Itens::findOrFail($id); // Busca o model pelo ID ou lança uma exceção se não encontrá-lo
        $model->name = $request->name;
        $model->descricao = $request->descricao;
        $model->save();

        return redirect()->back()
            ->with('success', 'Item atualizado com sucesso.');
    }


    public function store(Request $request)
    {

        $item = new Itens();
        $item->name = $request->name;
        $item->descricao = $request->descricao;
        $item->save();

        return redirect()->route('itens.create')
            ->with('success', 'Item  criado com sucesso.');
    }

    public function destroy($id)
    {
        $item = Itens::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => 'Item deleteado com sucesso']);
    }
}

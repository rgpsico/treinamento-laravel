<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use Illuminate\Http\Request;


class ItensController extends Controller
{
    protected $model;

    public function __construct(Itens $model)
    {
        $this->model = $model;        
    }

    public function index()
    {
        $model = $this->model::all(['id','name', 'descricao']);
        return view('imovel.itens.index')->with(['model' => $model]);
    }

    public function create()
    {
       
        return view('imovel.itens.create');
    }

    public function store(Request $request)
    {
        
        $item = new Itens();
        $item->name = $request->name;
        $item->descricao = $request->descricao;
        $item->save();

        return redirect()->route('itens.create')
        ->with('success','Item  criado com sucesso.');
    }

    public function delete($id)
    {
        $item = Itens::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item deletado com sucesso']);
    }

}

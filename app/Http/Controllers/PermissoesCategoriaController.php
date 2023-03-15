<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\PermissoesCategoria;
use Illuminate\Http\Request;

class PermissoesCategoriaController extends Controller
{
    protected $data;
    protected $pageTitle = 'Categoria Permissões';

    public function __construct(PermissoesCategoria $permissoes)
    {
        $this->data = $permissoes;
    }
    public function index()
    {
        $model = $this->data->all();
        $pageTitle = $this->pageTitle;
        return  view('permissoes_categoria.index', compact('model', 'pageTitle'));
    }

    public function create()
    {
        return  view('permissoes_categoria.create');
    }

    public function edit($id)
    {
        $data =  $this->data::find($id);
        return  view('permissoes_categoria.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->data->create($data);

        if ($result) {
            return redirect()->route('permissoes_categoria.create')
                ->with(['success' => 'Permissao criada  com sucesso']);
        }
    }

    public function update($id, Request $request)
    {
        $Permissoes = $this->data::find($id);

        $result = $Permissoes->update($request->all());

        if ($result) {
            return  redirect()->route('permissoes_categoria.edit', ['id' => $id])->with("success", 'Permissoes Editado com sucesso');
        }
    }

    public function destroy($id)
    {
        $permissao = $this->data::findOrFail($id);
        $permissao->delete();
        return  redirect()->route('permissoes_categoria.index')->with("success", 'Permissoes Excluida com sucesso');
    }
}

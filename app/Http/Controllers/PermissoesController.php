<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\PermissoesCategoria;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    protected $permissoes;
    protected $permissoes_categoria;
    protected $pageTitle = 'Permissões';

    public function __construct(Permissoes $permissoes, PermissoesCategoria $categoria)
    {
        $this->permissoes = $permissoes;
        $this->permissoes_categoria = $categoria;
    }
    public function index()
    {
        $model = $this->permissoes->all();
        $pageTitle = $this->pageTitle;
        return  view('permissoes.index', compact('model', 'pageTitle'));
    }

    public function create()
    {
        $categoria = $this->permissoes_categoria::all();
        return  view('permissoes.create', [
            'categoria' => $categoria
        ]);
    }

    public function edit($id)
    {
        $categoria = $this->permissoes_categoria::all();
        $data = $this->permissoes::find($id);
        return  view('permissoes.create', [
            'data' => $data,
            'categoria' => $categoria
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $result = $this->permissoes->create($data);

        if ($result) {
            return redirect()->route('permissoes.create')
                ->with(['success' => 'Permissao criada  com sucesso']);;
        }
    }

    public function update($id, Request $request)
    {
        $permissoes = $this->permissoes::find($id);

        $result = $permissoes->update($request->all());

        if ($result) {
            return  redirect()->route('permissoes.edit', ['id' => $id])->with("success", 'Permissoes Editado com sucesso');
        }
    }

    public function destroy($id)
    {
        $permissao = $this->permissoes::findOrFail($id);
        $permissao->delete();
        return  redirect()->route('permissoes.index')->with("success", 'Permissoes Excluida com sucesso');
    }
}

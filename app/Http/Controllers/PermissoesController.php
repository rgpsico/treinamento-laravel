<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    protected $permissoes;
    protected $pageTitle = 'Permissões';

    public function __construct(Permissoes $permissoes)
    {
        $this->permissoes = $permissoes;
    }
    public function index()
    {
        $model = $this->permissoes->all();
        $pageTitle = $this->pageTitle;
        return  view('permissoes.index', compact('model', 'pageTitle'));
    }

    public function create()
    {
        return  view('permissoes.create');
    }

    public function edit($id)
    {
        $data = permissoes::find($id);
        return  view('permissoes.create')->with('data', $data);
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
        $Permissoes = Permissoes::find($id);

        $result = $Permissoes->update($request->all());

        if ($result) {
            return  redirect()->route('permissoes.edit', ['id' => $id])->with("success", 'Permissoes Editado com sucesso');
        }
    }

    public function destroy($id)
    {
        $permissao = Permissoes::findOrFail($id);
        $permissao->delete();
        return  redirect()->route('permissoes.index')->with("success", 'Permissoes Excluida com sucesso');
    }
}

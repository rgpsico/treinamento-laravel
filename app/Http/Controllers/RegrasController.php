<?php

namespace App\Http\Controllers;

use App\Models\Regras;
use Illuminate\Http\Request;


class RegrasController extends Controller
{
    protected $model;
    protected $pageTitle = 'regras';
    protected $route = 'regras';
    protected $view = 'regras';


    public function __construct(Regras $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model = $this->model::all(['id', 'descricao']);
        $pageTitle = $this->pageTitle;
        return view($this->view . '.index')->with(['model' => $model, 'pageTitle' => $pageTitle, 'route' => $this->route]);
    }

    public function create()
    {
        $route = $this->route;
        $view = $this->view;
        $pageTitle = $this->pageTitle;
        return view($this->view . '.create', compact('route', 'view', 'pageTitle'));
    }

    public function edit($id)
    {
        $route = $this->route;
        $view = $this->view;
        $pageTitle = $this->pageTitle;

        if ($model = $this->model->where('id', $id)->first()) {
            return view($this->view . '.create', compact('model', 'route', 'view', 'pageTitle'));
        }
    }

    public function update(Request $request, $id)
    {

        $model = $this->model::findOrFail($id); // Busca o model pelo ID ou lança uma exceção se não encontrá-lo
        $model->descricao = $request->descricao;
        $model->save();

        return redirect()->back()
            ->with('success', $this->pageTitle . ' atualizado com sucesso.');
    }


    public function store(Request $request)
    {

        $item = $this->model;
        $item->descricao = $request->descricao;
        $item->save();

        return redirect()->route($this->route . '.index')
            ->with('success', $this->pageTitle . '  Criado com sucesso.');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => $this->pageTitle . ' deletado com sucesso']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Depoimento;
use App\Models\Itens;
use Illuminate\Http\Request;


class LogsController extends Controller
{
    protected $model;
    protected $pageTitle = 'Logs';
    protected $view = 'logs';
    protected $route = 'log';

    public function __construct(Depoimento $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model = $this->model::all(['id', 'autor', 'depoimento']);
        $pageTitle = $this->pageTitle;
        return view($this->view . '.index')->with(['model' => $model, 'pageTitle' => $pageTitle, 'route' => $this->route, 'view' => $this->view]);
    }

    public function create()
    {

        return view($this->view . '.create');
    }

    public function edit($id)
    {

        if ($model = $this->model->where('id', $id)->first()) {
            return view($this->view . '.create', compact('model'));
        }
    }

    public function update(Request $request, $id)
    {

        $model = $this->model::findOrFail($id); // Busca o model pelo ID ou lança uma exceção se não encontrá-lo
        $model->autor = $request->autor;
        $model->depoimento = $request->depoimento;
        $model->save();

        return redirect()->back()
            ->with('success', $this->pageTitle . 'atualizado com sucesso.');
    }


    public function store(Request $request)
    {

        $item = $this->model;
        $item->autor = $request->autor;
        $item->depoimento = $request->depoimento;
        $item->save();

        return redirect()->route($this->view . '.index')
            ->with('success', $this->pageTitle . ' criado com sucesso.');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => $this->pageTitle . ' deleteado com sucesso']);
    }
}

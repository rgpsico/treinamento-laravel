<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComercioController extends Controller
{
    protected $pageTitle = '';
    protected $view = '';
    protected $route = '';
    protected $model;

    public function __construct(Comercio $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model = $this->model::all();
        return view($this->view . '.index', [
            'data' => $model
        ]);
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function store(Request $request)
    {
        $this->model->create($request->all());
        return redirect()->route($this->route . '.index')->with('success', 'Comércio criado com sucesso.');
    }

    public function show($id)
    {
        $comercio = $this->model->find($id);
        return view($this->view . '.show', [
            'comercio' => $comercio
        ]);
    }

    public function edit($id)
    {
        $comercio = $this->model->find($id);
        return view($this->view . '.edit', [
            'comercio' => $comercio
        ]);
    }

    public function update(Request $request, $id)
    {
        $comercio = $this->model->find($id);
        $comercio->update($request->all());
        return redirect()->route($this->route . '.index')->with('success', 'Comércio atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $comercio = $this->model->find($id);
        if ($comercio) {
            $comercio->delete();
            return redirect()->route($this->route . '.index')->with('success', 'Comércio excluído com sucesso.');
        } else {
            return redirect()->route($this->route . '.index')->with('error', 'Comércio não encontrado.');
        }
    }
}

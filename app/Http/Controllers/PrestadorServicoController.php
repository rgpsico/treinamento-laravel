<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comercio;
use App\Models\User;
use Illuminate\Http\Request;


class PrestadorServicoController extends Controller
{
    protected $pageTitle = 'Prestador';
    protected $view = 'prestador';
    protected $route = 'prestador';
    protected $model;
    protected $categorias;
    protected $fillable = ['name', 'email', 'phone', 'telefone'];

    public function __construct(User $model, Category $categoria)
    {
        $this->model = $model;
        $this->categorias = $categoria;
    }

    public function index()
    {

        $model = $this->model::all();
        return $this->data($model, 'index');
    }

    public function data($model, $page)
    {

        return view($this->view . '.' . $page, [
            'model' => $model,
            'pageTitle' => $this->pageTitle,
            'route' => $this->route,
            'view' => $this->view . '.' . $page,
            'partials' => $this->view,
            'categorias' => $this->categorias::all()
        ]);
    }

    public function create()
    {
        $model = [];
        return $this->data($model, 'create');
    }

    public function registerHome()
    {

        $model = [];
        return $this->data($model, 'registerHome');
    }



    public function store(Request $request)
    {

        $data = $request->only($this->fillable);


        if ($request->hasFile('logo')) {
            $filename = time() . '_' . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = public_path('imagens/comercio/');
            $request->file('logo')->move($path, $filename);
            $data['logo'] = $filename;
        }



        $model = $this->model::create($data);

        return $this->data($model, 'index');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $comercio = $this->model::find($id);
        if ($request->hasFile('logo')) {
            $filename = time() . '_' . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = public_path('imagens/comercio/');
            $request->file('logo')->move($path, $filename);
            $data['logo'] = $filename;
        }


        $comercio->update($data);

        return redirect()->route('comercio.index', ['comercio' => $comercio->id]);
    }

    public function show($id)
    {
        $model = $this->model->find($id);
        return view($this->view . '.show', [
            'model' => $model
        ]);
    }

    public function edit($id)
    {
        $model = $this->model->find($id);
        return $this->data($model, 'create');
    }



    public function destroy($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
            return redirect()->route($this->route . '.index')->with('success', 'Comércio excluído com sucesso.');
        } else {
            return redirect()->route($this->route . '.index')->with('error', 'Comércio não encontrado.');
        }
    }
}

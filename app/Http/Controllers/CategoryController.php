<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $pageTitle = 'Categoria';
    protected $view = 'category';
    protected $route = 'category';
    protected $model;
    protected $fillable = ['name', 'description', 'link'];

    public function __construct(Category $model)
    {
        $this->model = $model;
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
            'partials' => $this->view
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


        $categoria = $this->model::create($data);

        return redirect()->back()->with(['success' => 'Cadastrado com sucesso']);
    }

    public function update(Request $request, $id)
    {


        $data = $request->all();
        $categoria = $this->model::find($id);

        $categoria->update($data);

        return redirect()->route('category.index', ['categoria' => $categoria->id])->with(['success' => 'Atualizada com sucesssso']);
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
            return redirect()->route($this->route . '.index')->with('success', 'Categoria excluída com sucesso.');
        } else {
            return redirect()->route($this->route . '.index')->with('error', 'Categoria foi não encontrada.');
        }
    }
}

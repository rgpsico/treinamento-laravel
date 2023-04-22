<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ComercioController extends Controller
{
    protected $pageTitle = 'Comércio';
    protected $view = 'comercio';
    protected $route = 'comercio';
    protected $model;
    protected $categorias;
    protected $fillable = ['nome', 'endereco', 'telefone', 'status', 'logo'];

    public function __construct(Comercio $model, Category $categoria)
    {
        $this->model = $model;
        $this->categorias = $categoria;
    }

    public function index()
    {
        $model = $this->model::all();
        return $this->data($model, 'index');
    }

    public function indexPublic()
    {
        $model = $this->model::paginate();
        return view('comercio.list', compact('model'));
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



        $comercio = Comercio::create($data);

        return  redirect()->back()->with(['success' => 'Comercio ver Cadastrado com sucesso']);
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
        $comercio = $this->model->find($id);
        return view($this->view . '.show', [
            'comercio' => $comercio
        ]);
    }

    public function edit($id)
    {
        $comercio = $this->model->find($id);
        return $this->data($comercio, 'create');
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

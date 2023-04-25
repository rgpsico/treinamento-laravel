<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comercio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ControllerDataTrait;

class EntregadoresController extends Controller
{
    protected $pageTitle = 'Entregadores';
    protected $view = 'entregadores';
    protected $route = 'entregadores';
    protected $model;
    protected $fillable = ['nome', 'endereco', 'telefone', 'status', 'logo'];
    protected $categorias;
    use ControllerDataTrait;

    public function __construct(User $model, Category $categorias)
    {
        $this->model = $model;
        $this->categorias = $categorias;
    }

    public function listar()
    {
        $model = $this->model::paginate();
        return view($this->route . '.list', compact('model'));
    }

    public function index()
    {
        $model = $this->model::all();
        return $this->data($model, 'index');
    }

    public function create()
    {
        $model = [];
        return $this->data($model, 'create');
    }

    public function store(Request $request)
    {
        $data = $request->only($this->fillable);


        if ($request->hasFile('logo')) {
            $filename = time() . '_' . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = public_path('imagens/' . $this->view);
            $request->file('logo')->move($path, $filename);
            $data['logo'] = $filename;
        }


        $comercio = $this->model::create($data);

        return $this->data($comercio, 'index');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();
        $comercio = $this->model::find($id);


        if ($request->hasFile('logo')) {
            $filename = time() . '_' . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = public_path('imagens/entregadores/');
            $request->file('logo')->move($path, $filename);
            $data['logo'] = $filename;
        }


        $comercio->update($data);

        return redirect()->route($this->route . '.index', ['comercio' => $comercio->id]);
    }

    public function show($id)
    {
        $model = $this->model->find($id);
        return view(
            'public.entregadores.show',
            ['model' => $model]
        );
    }

    public function edit($id)
    {
        $comercio = $this->model->find($id);
        return $this->data($comercio, 'create');
    }

    public function registerHome()
    {
        $comercio = [];
        return $this->data($comercio, 'registerHome');
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

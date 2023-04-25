<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comercio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ControllerDataTrait;

class ComercioApiController extends Controller
{
    protected $pageTitle = 'Comercio';
    protected $view = 'comercio';
    protected $route = 'entregadores';
    protected $pasta = 'imagens/entregadores/';
    protected $model;
    protected $fillable = ['nome', 'endereco', 'telefone', 'status', 'logo'];
    protected $categorias;
    use ControllerDataTrait;

    public function __construct(Comercio $model, Category $categorias)
    {
        $this->model = $model;
        $this->categorias = $categorias;
    }



    public function get()
    {
        $entregadores = $this->model::all();
        return response()->json($entregadores);
    }

    public function getById($id)
    {
        $entregador = $this->model::find($id);
        if (!$entregador) {
            return response()->json(['error' => 'Entregador não encontrado'], 404);
        }
        return response()->json($entregador);
    }

    public function createEntregador(Request $request)
    {
        $data = $request->only($this->fillable);

        if ($request->hasFile('logo')) {
            $filename = time() . '_' . rand() . '.' . $request->file('logo')->getClientOriginalExtension();
            $path = public_path('imagens/' . $this->view);
            $request->file('logo')->move($path, $filename);
            $data['logo'] = $filename;
        }

        $entregador = $this->model::create($data);
        return response()->json($entregador, 201);
    }


    public function update(Request $request, $id)
    {
        $entregador = $this->model::find($id);
        if (!$entregador) {
            return response()->json(['error' => 'Entregador não encontrado'], 404);
        }

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $filename = time() . '_' . rand() . '.' . $request->file('foto')->getClientOriginalExtension();
            $path = public_path($this->pasta);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $request->file('foto')->move($path, $filename);
            $data['foto'] = $filename;
        }

        $entregador->update($data);
        return response()->json($entregador);
    }


    public function updateStatus(Request $request, $id)
    {
        $entregador = $this->model::find($id);
        if (!$entregador) {
            return response()->json(['error' => 'Entregador não encontrado'], 404);
        }

        $data = $request->all();


        $entregador->update($data);
        return response()->json($entregador);
    }


    public function show($id)
    {
        $comercio = $this->model->find($id);
        return view($this->view . '.show', [
            'comercio' => $comercio
        ]);
    }

    public function deleteEntregador($id)
    {
        $entregador = $this->model::find($id);
        if (!$entregador) {
            return response()->json(['error' => 'Entregador não encontrado'], 404);
        }

        $entregador->delete();
        return response()->json(['message' => 'Entregador excluído com sucesso']);
    }
}

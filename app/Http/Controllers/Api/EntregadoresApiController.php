<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comercio;
use App\Models\Profissional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ControllerDataTrait;

class EntregadoresApiController extends Controller
{
    protected $pageTitle = 'Entregadores';
    protected $view = 'entregadores';
    protected $route = 'entregadores';
    protected $pasta = 'imagens/entregadores/';
    protected $model;
    protected $fillable = ['nome', 'endereco', 'telefone', 'status', 'logo'];
    protected $categorias;
    protected $profissional;


    use ControllerDataTrait;

    public function __construct(User $model, Category $categorias, Profissional $profissional)
    {
        $this->profissional = $profissional;
        $this->model = $model;
        $this->categorias = $categorias;
    }



    public function getEntregadores()
    {
        $entregadores = $this->model::all();
        return response()->json($entregadores);
    }

    public function getEntregadorById($id)
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


    public function updateEntregador(Request $request, $id)
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
        $profissional = $this->profissional::find($id);
        if (!$profissional) {
            return response()->json(['error' => 'Entregador não encontrado'], 404);
        }

        $data = $request->all();


        $profissional->update($data);
        return response()->json($profissional);
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

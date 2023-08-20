<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comercio;
use App\Models\Profissional;
use App\Models\ProfissionalGallery;
use App\Models\User;
use App\Models\UserTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ControllerDataTrait;

class ProfissionaisApiController extends Controller
{
    protected $pageTitle = 'profissionais';
    protected $view = 'profissionais';
    protected $route = 'profissionais';
    protected $pasta = 'imagens/profissionais/';

    protected $model;
    protected $gallery;


    public function __construct(Profissional $model, ProfissionalGallery $gallery)
    {
        $this->model = $model;
        $this->gallery = $gallery;
    }



    public function get()
    {
        $modeles = $this->model::all();
        return response()->json($modeles);
    }

    public function getById($id)
    {
        $model = $this->model::find($id);
        if (!$model) {
            return response()->json(['error' => 'model não encontrado'], 404);
        }
        return response()->json($model);
    }




    public function update(Request $request, $id)
    {
        $model = $this->model::find($id);
        if (!$model) {
            return response()->json(['error' => 'model não encontrado'], 404);
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

        $model->update($data);
        return response()->json($model);
    }


    public function updateStatus(Request $request, $id)
    {
        $model = $this->model::find($id);
        if (!$model) {
            return response()->json(['error' => 'model não encontrado'], 404);
        }

        $data = $request->all();


        $model->update($data);
        return response()->json($model);
    }


    public function show($id)
    {
        $comercio = $this->model->find($id);
        return view($this->view . '.show', [
            'comercio' => $comercio
        ]);
    }

    public function delete($id)
    {
        $gallery = $this->gallery::find($id);
        if (!$gallery) {
            return response()->json(['error' => 'model não encontrado'], 404);
        }
        Storage::disk('public')->delete($gallery->image);

        $gallery->delete();

        return response()->json(['message' => 'model e suas imagens foram excluídos com sucesso']);
    }

    public function storeProfissao(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            //  'descricao' => 'required',
        ]);

        $profissao = new UserTipo();
        $profissao->nome = $request->nome;
        //  $profissao->descricao = $request->descricao;
        $profissao->save();

        return response()->json(['id' => $profissao->id]);
    }
}

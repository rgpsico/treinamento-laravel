<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comercio;
use App\Models\Profissional;
use App\Models\ProfissionalGallery;
use App\Models\ProfissionalTipo;
use App\Models\User;
use App\Models\UserTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Traits\ControllerDataTrait;

class ProfissaoApiController extends Controller
{
    protected $pageTitle = 'Profissao';

    protected $model;



    public function __construct(UserTipo $model)
    {
        $this->model = $model;
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




    public function delete($id)
    {
        $model = $this->model::find($id);
        if (!$model) {
            return response()->json(['error' => 'model não encontrado'], 404);
        }

        $model->delete();

        return response()->json(['message' => 'Profissao excluida com sucesso']);
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

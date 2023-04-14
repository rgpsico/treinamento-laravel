<?php

namespace App\Http\Controllers;

use App\Models\UserGallery;
use Illuminate\Http\Request;


class ImageApiController extends Controller
{
    protected $model;

    public function __construct(UserGallery $model)
    {
        $this->model = $model;
    }


    public function delete($id)
    {
        if ($model = $this->model->find($id)) {
            $path = public_path('imagens/imoveis/' . $model->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $model->delete();
            return response()->json(['message' => 'Imagem excluída com sucesso.']);
        }
        return response()->json(['message' => 'Imagem não encontrada.'], 404);
    }
}

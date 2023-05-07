<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelApicontroller extends Controller
{

    public function index()
    {
        $imoveis = Imovel::all();
        return response()->json(['imoveis' => $imoveis]);
    }

    public function search(Request $request)
    {
        $query = Imovel::query();

        // Filtro por tipo
        if ($request->has('tipo')) {
            $tipo = $request->input('tipo');
            $query->where('type', $tipo);
        }

        // Filtro por status
        if ($request->has('status')) {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        // Filtro por proprietário
        if ($request->has('proprietario')) {
            $proprietario = $request->input('proprietario');
            $query->where('proprietario', $proprietario);
        }

        // Filtro por preço
        if ($request->has('preco')) {
            $preco = $request->input('preco');
            $query->where('price', $preco);
        }
        $imoveis = $query->with('gallery', 'user')->get();
        $imoveis = $imoveis->map(function ($imovel) {
            // Criar uma cópia dos atributos do imóvel para evitar alterações no modelo original
            $imovelData = clone $imovel;

            // Adicionar o nome do usuário ao objeto imovelData
            $imovelData->user_name = $imovel->user->name;

            return $imovelData;
        });

        return response()->json(['imoveis' => $imoveis]);
    }



    public function delete($id)
    {
        if ($imovel = Imovel::where('id', $id)->first()) {
            $imovel->delete();
            return response()->json(['content' => 'success']);
        }
        return response()->json(['content' => 'Imovel não encontrado']);
    }

    public function update(Request $request, $id)
    {

        $imovel = Imovel::find($id);

        if (!$imovel) {
            return response()->json(['content' => 'Imóvel não encontrado']);
        }

        $imovel->update($request->all());

        return response()->json(['content' => 'success']);
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('ids');
        Imovel::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelApicontroller extends Controller
{

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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;


class ImovelApicontroller extends Controller
{
    
    public function delete($id)
    {
       if($imovel = Imovel::where('id', $id)->first()){
            $imovel->delete();
            return response()->json(['content' => 'success']);
       }
       return response()->json(['content' => 'Imovel não encontrado']);
    }

}

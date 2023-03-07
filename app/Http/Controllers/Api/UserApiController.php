<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use App\Models\User;

class UserApiController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return response()->json($users);
    }
}

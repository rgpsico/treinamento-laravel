<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserApiController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'User created successfully']);
    }

    public function updateAdmin(Request $request, $id)
    {

        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->is_admin = $request->is_admin;

        $user->save();

        if ($request->is_admin == 1) {
            return response()->json(['message' => 'Usuario agora é um administrador']);
        }

        return response()->json(['message' => 'Usuário agora é um usuário comum ']);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    public function upload(Request $request)
    {
        $user = User::find($request->id);

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = public_path('uploads') . '/' . $nomeImagem;

            // Remove a imagem antiga, se existir
            if ($user->avatar) {
                Storage::delete('uploads/' . $user->avatar);
            }

            $user->avatar = $nomeImagem;
            $user->save();

            $imagem->move(public_path('uploads'), $nomeImagem);

            return response()->json(['status' => 'sucesso', 'mensagem' => 'Imagem enviada com sucesso', 'caminho' => $caminhoImagem]);
        } else {
            return response()->json(['status' => 'erro', 'mensagem' => 'Nenhuma imagem enviada']);
        }
    }
}

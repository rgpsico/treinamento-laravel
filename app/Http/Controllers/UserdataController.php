<?php

namespace App\Http\Controllers;

use App\Models\PermissaoUser;
use App\Models\Permissoes;
use App\Models\PermissoesCategoria;
use App\Models\PermissoesUser;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserdataController extends Controller
{
    protected $pageTitle = 'Usuarios';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = $this->pageTitle;
        $model = User::all();



        return view('users.index', compact('model', 'pageTitle'));
    }

    public function novo()
    {
        $User = User::all();

        return view('novo.list');
    }

    public function create()
    {

        return view('users.edit');
    }

    public function edit($id)
    {
        $permissoes = Permissoes::all();
        $categorias = PermissoesCategoria::all();
        $user = User::where('id', $id)->first();
        return view(
            'users.edit',
            [
                'data' => $user,
                'permissoes' => $permissoes,
                'categorias' => $categorias
            ]
        );
    }


    public function addPermissao(Request $request)
    {
        $user_id = $request->user_id;
        $permission_ids = $request->permission_id ?? [];

        PermissaoUser::where('user_id', $user_id)
            ->whereNotIn('permission_id', $permission_ids)
            ->delete();

        foreach ($permission_ids as $permission_id) {
            PermissaoUser::updateOrCreate(
                ['user_id' => $user_id, 'permission_id' => $permission_id],
                ['user_id' => $user_id, 'permission_id' => $permission_id]
            );
        }

        return redirect()->back()->with('success', 'As permissões foram atualizadas com sucesso.');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('novo.login.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RegisterFormValidation
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'type' => 'required',
            'phone' => 'required',
            'password' => 'required|same:confirm_password',
        ]);



        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            auth()->login($user);

            if ($request->type == 1) {
                return redirect()->route('novo.listar')->with('success', 'Usuário cadastrado com sucesso!');
            }

            if ($request->type == 2) {
                return redirect()->route(
                    'imovel.users',
                    ['user_id' => $user->id]
                )->with('success', 'Usuário cadastrado com sucesso!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->get();
        return view('users.show', ['data' => $data]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('novo.login.login');
    }

    public function auth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('imovel.create');
        }

        return back()->withErrors(['error' => 'Credenciais inválidas.']);
    }

    public function authApi(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = $request->only(['email', 'password']);



        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Usuario ou senha errado'], 401);
        }

        return response()->json([
            'token' => $token,
            'type' => 'bearer'

        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('novo.listar');
    }
}

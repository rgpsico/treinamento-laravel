<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormValidation;
use App\Models\Profile;
use App\Models\ProfileUser;
use App\Models\User;
use App\Models\UserData;
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

        $profile = Profile::all();

        return view('users.index', compact('model', 'profile', 'pageTitle'));
    }

    public function novo()
    {
        $User = User::all();

        return view('novo.list');
    }



    public function profileUpdate(Request $request)
    {
        $id = $request->user_id;



        $profile = ProfileUser::updateOrCreate(
            ['user_id' => $id],
            [
                'profile_id' => $request->input('profile_id'),
                'user_id' => $request->input('user_id'),
                // Adicione outros campos aqui
            ]
        );

        if ($profile->wasRecentlyCreated) {
            // O registro foi criado
            return redirect()->back()->with('success', 'O perfil foi criado com sucesso.');
        } else {
            // O registro foi atualizado
            return redirect()->back()->with('success', 'O perfil foi atualizado com sucesso.');
        }
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
    public function show()
    {
        return view('users.show');
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

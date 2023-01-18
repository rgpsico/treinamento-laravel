<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormValidation;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::all();

        return view('user.index', compact('User'));
    }

    public function novo()
    {
        $User = User::all();

        return view('novo.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterFormValidation $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('imovel.create')
            ->with('success', 'Dados de usuário criados com sucesso.');
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
        return view('users.login');
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

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
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

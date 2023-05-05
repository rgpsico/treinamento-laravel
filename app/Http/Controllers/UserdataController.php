<?php

namespace App\Http\Controllers;

use App\Models\PermissaoUser;
use App\Models\Permissoes;
use App\Models\PermissoesCategoria;
use App\Models\PermissoesUser;
use App\Models\TipoUsuario;
use App\Models\User;
use App\Models\UserEndereco;
use App\Models\UserTipo;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use PhpSerial\Serial;


class UserdataController extends Controller
{
    use UploadTrait;

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
        $user = User::with('endereco')->where('id', $id)->first();
        return view(
            'users.edit',
            [
                'data' => $user,
                'permissoes' => $permissoes,
                'categorias' => $categorias
            ]
        );
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:255',
        ]);



        $user = User::find($id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/avatars/' . $filename);
            Image::make($avatar->getRealPath())->resize(200, 200)->save($path);
            $user->avatar = '/avatars/' . $filename;
        }



        $endereco = UserEndereco::where('user_id', $id)->first();
        $endereco->rua = $request->rua;
        $endereco->cep = $request->cep;
        $endereco->estado = $request->estado;


        $endereco->save();

        $user->save();
        return redirect()->route('users.edit', ['id' => $id])
            ->with(['success' => 'Usuario Atualizado  com sucesso']);;
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

        $tipoUser = UserTipo::all();
        return view('novo.login.register', compact('tipoUser'));
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
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.unique' => 'Este email já está em uso.',
            'type.required' => 'O campo tipo é obrigatório.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.same' => 'As senhas informadas não são iguais.',
        ]);



        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Usuário Não pode ser Cadastrado!');;
        }


        if ($request->hasFile('avatar')) {
            $filename = time() . '_' . rand() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $path = public_path('imagens/entregadores/');
            $request->file('avatar')->move($path, $filename);
            $data['avatar'] = $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $filename,
            'password' => Hash::make($request->password),
        ]);

        $user->userTipoUsers()->create([
            'user_id' => $user->id,
            'tipo_usuario_id' => $request->type
        ]);

        if ($user) {
            auth()->login($user);
            return redirect()->route('novo.categoria')->with('success', 'Cadastrado com sucesso!');
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


    public function teste()
    {


        // Let's start the class
        $serial = new Serial;

        // First we must specify the device. This works on both linux and windows (if
        // your linux serial device is /dev/ttyS0 for COM1, etc)
        $serial->deviceSet("COM1");

        // We can change the baud rate, parity, length, stop bits, flow control
        $serial->confBaudRate(2400);
        $serial->confParity("none");
        $serial->confCharacterLength(8);
        $serial->confStopBits(1);
        $serial->confFlowControl("none");

        // Then we need to open it
        $serial->deviceOpen();

        // To write into
        $serial->sendMessage("Hello !");
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
        return redirect()->route('listar.imoveis.public');
    }
}

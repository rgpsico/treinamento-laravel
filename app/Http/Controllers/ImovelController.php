<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImoveisRequest;
use App\Models\Imovel;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $tipo = $request->input('type');
        $comunidade = $request->input('comunidade');
        $tamanho = $request->input('tamanho');
      
        $imoveis = Imovel::query();
      
        if ($tipo == 0 || $tipo == 1) {
          $imoveis->where('type', $tipo);
        }
      
        if ($comunidade) {
          $imoveis->where('comunidade', $comunidade);
        }
      
        if ($tamanho) {
          $imoveis->where('tamanho', $tamanho);
        }
      
        $data = $imoveis->get();
      
        return view('imovel.index', compact('data'), ['request' => $request]);
    }

    public function index(Request $request)
    {
       
        $data = Imovel::paginate();
      
          
        return view('imovel.index', compact('data'),  ['request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imovel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       
       
        $imovel = new Imovel();
        $imovel->title = $request->title;
        $imovel->type = $request->type;
      
        $imovel->description = $request->description;
        $imovel->address = $request->address;
        $imovel->user_id = $request->user_id;
        $imovel->price = $request->price;

        if ($request->avatar) {          
            $avatar = $request->file('avatar');
          
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/imagens/imoveis/');
            $avatar->move($path, $filename);
            $imovel->avatar =  $filename;
          }
            
          
          $imovel->save();

        return redirect()->route('imovel.create')
                        ->with('success','Imovel criados com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($data = Imovel::where('id', $id)->first()){
            return view('imovel.show',[
                'data' => $data
            ]);
        }
        
       
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        dd("aqui");
    }


    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('imovel.index')
                        ->with('success','Dados de usuário criados com sucesso.');
    }

}

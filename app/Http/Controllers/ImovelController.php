<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImoveisRequest;
use App\Models\Imovel;
use App\Models\User;
use App\Models\UserData;
use App\Models\userGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($data = Imovel::where('id', $id)->first()){
            return view('imovel.edit',[
                'data' => $data
            ]);
        }
  
    }

    public function update(Request $request, $id)
    {
        // Valide os dados de entrada
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        // ]);

        // Encontre o im??vel pelo ID
        $imovel = Imovel::findOrFail($id);

        // Atualize os dados do im??vel
        $imovel->title = $request->input('title');
        $imovel->description = $request->input('description');
        $imovel->avatar = $request->input('avatar');
        $imovel->type = $request->input('type');
        $imovel->price = $request->input('price');

  
        if ($request->avatar) {          
            $avatar = $request->file('avatar');
          
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/imagens/imoveis/');
            $avatar->move($path, $filename);
            $imovel->avatar =  $filename;
          }
          
        $imovel->save();

        // Redirecione o usu??rio de volta para a p??gina de exibi????o de im??veis
        return redirect()->route('imovel.edit', ['id' => $imovel->id]);
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
        $imovel->save();

        if ($request->avatar) {       
            foreach($request->avatar as $value ){
              $filename = time() . '.' . $value->getClientOriginalExtension();
              $path = public_path('/imagens/imoveis/');
              $value->move($path, $filename);
              $imovel->avatar =  $filename;
    
              $imagem = new userGallery();
              $imagem->user_id = auth()->user()->id;
              $imagem->imovel_id = $imovel->id;
              $imagem->image = $filename;
              $imagem->save();
              
            }
          }
          
         
            
          
         

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
            $galleries = $data->gallery()->get();
            return view('imovel.show',[
                'data' => $data,
                'galleries' => $galleries
            ]);
        }
        
       
    }


    public function myImoveis(Request $request, $user_id)
    {
        if($data = Imovel::where('user_id', $user_id)->get()){
            return view('imovel.myImoveis',[
                'data' => $data,
                'request' => $request
            ]);
        }
        
       
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($imovel = Imovel::find($id)->first()){
           
           
            $imovel->destroy($id);
            return redirect()->route('imovel.users',[
                'user_id' =>$imovel->user_id
            ])
            ->with('success','Imovel foi excluido com sucesso');
        }
    }


    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('imovel.index')
                        ->with('success','Dados de usu??rio criados com sucesso.');
    }

}

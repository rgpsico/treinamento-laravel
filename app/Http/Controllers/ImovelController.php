<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImoveisRequest;
use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use App\Models\ImovelItens;
use App\Models\Itens;
use App\Models\User;
use App\Models\UserData;
use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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


    public function categoria()
    {
        return view('novo.categoria');
    }

    public function detalhes($id)
    {
        $pageTitle = "Imoveis";
        $data = Imovel::where('id', $id)->get()->first();
        $imoveis = Imovel::all();
        return view('novo.detalhes', compact('data', 'imoveis', 'pageTitle'));
    }

    public function listarN()
    {
        $datas = Imovel::paginate();
        return view('novo.list', compact('datas'));
    }

    public function all()
    {
        $data = Imovel::all();
        $pageTitle = 'Todos os Imoveis ';

        return view('imovel.index', compact('data',  'pageTitle'));
    }

    public function home()
    {
        $datas = Imovel::paginate();
        return view('novo.home', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itens = Itens::all();
        return view('imovel.create')->with(['itens' => $itens]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        if ($data = Imovel::where('id', $id)->first()) {
            return view('imovel.edit', [
                'data' => $data,
                'itens' => [],
                'pageTitle' => 'Todos os Imoveis'
            ]);
        }
    }

    public function update(Request $request, $id)
    {



        $imovel = Imovel::findOrFail($id);

        $imovel->title = $request->input('title');
        $imovel->description = $request->input('description');
        $imovel->avatar = $request->input('avatar');
        $imovel->type = $request->input('type');
        $imovel->price = $request->input('price');
        $imovel->status = $request->input('status');

        if ($request->avatar) {
            $avatar = $request->file('avatar');

            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/imagens/imoveis/');
            $avatar->move($path, $filename);
            $imovel->avatar =  $filename;
        }

        $imovel->save();


        // Redirecione o usuário de volta para a página de exibição de imóveis
        return redirect()->route('imovel.edit', ['id' => $imovel->id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImovelStoreRequest $request)
    {

        $imoveis    = new Imovel();

        $imovel = new Imovel();
        $imovel->title = $request->title;
        $imovel->type = $request->type;

        $imovel->description = $request->description;
        $imovel->address = $request->address;
        $imovel->user_id = $request->user_id;
        $imovel->price = $request->price;
        $imovel->status = 0;
        $imovel->save();


        if ($request->hasFile('avatar')) {
            foreach ($request->avatar as $key => $value) {
                $filename = time() . '.' . rand() . $value->getClientOriginalExtension();
                $path = public_path('/imagens/imoveis/');
                $value->move($path, $filename);

                $imagem = new userGallery();
                $imagem->user_id = auth()->user()->id;
                $imagem->imovel_id = $imovel->id;
                $imagem->image = $filename;
                $imagem->save();
            }
        }


        if ($itens = $request->input('itens')) {

            foreach ($itens as $item) {

                $itens = new ImovelItens();
                $itens->imovel_id = $imovel->id;
                $itens->item_id = $item;

                $itens->save();
            }
        }

        return redirect()->route('imovel.create')
            ->with('success', "Imóvel criado com sucesso. <a href='/imovel/" . $imovel->id . "/show'>Clique aqui</a> para ir para a página de teste.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Userdata  $userdata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($data = Imovel::where('id', $id)->first()) {
            $galleries = $data->gallery()->get();
            return view('imovel.show', [
                'data' => $data,
                'galleries' => $galleries
            ]);
        }
    }



    public function myImoveis(Request $request, $user_id)
    {
        if ($data = Imovel::where('user_id', $user_id)->get()) {
            return view('imovel.myImoveis', [
                'data' => $data,
                'pageTitle' => 'Meus Imovéis',
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
        if ($imovel = Imovel::find($id)->first()) {
            $imovel->destroy($id);

            return redirect()->route('imovel.users', [
                'user_id' => $imovel->user_id
            ])
                ->with('success', 'Imovel foi excluido com sucesso');
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
            ->with('success', 'Dados de usuário criados com sucesso.');
    }

    public function register2(Request $request)
    {
        $user = User::all();
        return $user;
    }
}

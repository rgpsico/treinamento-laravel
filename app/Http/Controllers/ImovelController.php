<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImovelStoreRequest;
use App\Models\Imovel;
use App\Models\ImovelItens;
use App\Models\Itens;
use App\Models\User;

use App\Models\UserGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class ImovelController extends Controller
{

    protected $view;
    protected $route;
    protected $model;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Imovel $model)
    {
        $this->model = $model;
    }


    public function search(Request $request)
    {
        $tipo = $request->input('type');
        $comunidade = $request->input('comunidade');
        $tamanho = $request->input('tamanho');

        $imoveis = $this->model::query();

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
        $data = $this->model::paginate();
        return view('imovel.index', compact('data'),  ['request' => $request]);
    }


    public function categoria()
    {
        return view('novo.categoria');
    }

    public function detalhes($id)
    {
        $pageTitle = "Imoveis";
        $data = $this->model::where('id', $id)->get()->first();
        $imoveis = $this->model::all();
        return view('public.imoveis.show', compact('data', 'imoveis', 'pageTitle'));
    }

    public function listarN()
    {
        $datas = $this->model::paginate();
        return view('novo.list', compact('datas'));
    }

    public function all()
    {
        $data = $this->model::all();
        $pageTitle = 'Todos os Imoveis ';

        return view('imovel.index', compact('data',  'pageTitle'));
    }

    public function home()
    {
        $datas = $this->model::paginate();
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
        return view('imovel.create')->with(['itens' => $itens, 'data' => []]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $itens = Itens::all();
        if ($data = $this->model::with('itens')->find($id)->first()) {
            return view('imovel.edit', [
                'data' => $data,
                'itens' => $itens,
                'pageTitle' => 'Todos os Imoveis'
            ]);
        }
    }

    public function update(ImovelStoreRequest $request, $id)
    {
        $imovel = $this->model::findOrFail($id);

        $imovel->fill($request->except(['avatar', 'deposito', 'venda', 'itens']));
        $imovel->deposito = $request->input('deposito') == 'on' ? 1 : 0;
        $imovel->venda = $request->input('venda') == 'on' ? 1 : 0;

        if ($request->hasFile('avatar')) {
            $this->handleAvatarUpload($request, $imovel);
        }

        $this->updateImovelItens($request, $imovel);

        $imovel->save();

        return redirect()->route('imovel.edit', ['id' => $imovel->id])->with(['success' => 'Imovel Atualizado com sucesso']);
    }

    private function handleAvatarUpload(ImovelStoreRequest $request, $imovel)
    {
        $userId = auth()->user()->id;
        $currentImageCount = userGallery::where('user_id', $userId)->count();

        if ($currentImageCount >= 5) {
            return redirect()->route('imovel.edit', ['id' => $imovel->id])
                ->withErrors(['errors' => 'Não pode ter mais de 5 fotos']);
        }

        $avatars = $request->file('avatar');
        foreach ($avatars as $avatar) {
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('/imagens/imoveis/');
            $avatar->move($path, $filename);

            $imagem = new userGallery();
            $imagem->user_id = auth()->user()->id;
            $imagem->imovel_id = $imovel->id;
            $imagem->image = $filename;
            $imagem->save();
        }

        $imovel->avatar = $filename;
    }

    private function updateImovelItens(ImovelStoreRequest $request, $imovel)
    {
        ImovelItens::where('imovel_id', $imovel->id)->delete();
        $itensMarcados = $request->input('itens') ?? [];

        foreach ($itensMarcados as $item) {
            if (!$imovel->itens->contains($item)) {
                ImovelItens::updateOrCreate(
                    ['item_id' => $item, 'item_id' => $item],
                    ['imovel_id' => $imovel->id, 'item_id' => $item]
                );
            }
        }
    }





    private function createImovel(ImovelStoreRequest $request)
    {
        $imovel = new Imovel();
        $imovel->fill($request->except(['avatar', 'itens']));
        $imovel->status = $request->status;
        $imovel->status_admin = $request->status_admin;
        $imovel->venda = $request->venda == 'on' ? 1 : 0;
        $imovel->deposito = $request->deposito == 'on' ? 1 : 0;
        $imovel->save();

        return $imovel;
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImovelStoreRequest $request)
    {
        $imovel = $this->createImovel($request);

        if ($request->hasFile('avatar')) {
            $this->handleAvatarUpload($request, $imovel);
        }

        $this->updateImovelItens($request, $imovel);

        return redirect()->route('imovel.create')
            ->with('success', "Imóvel criado com sucesso. <a href='/admin/imovel/" . $imovel->id . "/show'>Clique aqui</a> para ir para a página de teste.");
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

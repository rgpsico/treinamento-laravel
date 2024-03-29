<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\ProfissionalGallery;
use App\Models\ProfissionalTipo;
use App\Models\User;
use App\Models\UserTipo;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{
    use UploadTrait;

    protected $pageTitle = 'Profissionais';
    protected $view = 'profissionais';
    protected $route = 'profissionais';
    protected $model;
    protected $profissao;
    protected $profissionais;

    public function __construct(User $model, ProfissionalTipo $profissao, Profissional $profissionais)
    {
        $this->model = $model;
        $this->profissao = $profissao;
        $this->profissionais = $profissionais;
    }

    public function listar()
    {
        return view($this->view . '.list');
    }

    public function profissional($id)
    {

        $model = $this->model::with('profissionalGallery')->where('id', $id)->first();
        return view($this->view . '.profile', [
            'model' => $model
        ]);
    }

    public function profissionalPageBootrap($id)
    {

        $model = $this->model::where('id', $id)->first();
        return view($this->view . '.template01.index', [
            'model' => $model
        ]);
    }

    public function all()
    {
        $model = $this->profissionais::all();

        return view('profissionais.index', [
            'model' =>  $model,
            'route' => 'prestador',
            'pageTitle' => 'Profissões'
        ]);
    }

    public function profissionalTipo()
    {
        $model = $this->profissao::all();

        return view('profissao.index', [
            'model' =>  $model,
            'pageTitle' => 'Profissões'
        ]);
    }

    public function profissaolEdit($id)
    {
        $model = $this->profissao::where('id', $id)->first();

        return view('profissao.edit', [
            'model' =>  $model
        ]);
    }

    public function profissaoDestroy($id)
    {
        $model = $this->profissao::where('id', $id)->first();

        if ($model) {
            $model->delete();
            // Redireciona para a lista de profissões com uma mensagem de sucesso
            return redirect()->route('profissao.index')->with('success', 'Profissão excluída com sucesso.');
        } else {
            // Redireciona de volta com uma mensagem de erro se a profissão não for encontrada
            return back()->with('error', 'Profissão não encontrada.');
        }
    }




    public function indicacao(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
        ]);


        $user = User::findOrFail($request->user_id);

        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        $professional = $user->profissional()->firstOrCreate([]);


        $professional->update([
            'nome' => $request->nome,
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'instragan' => $request->instragan,
            'facebook' => $request->facebook,
            'sobre' => $request->sobre,
            'status' => $request->status,
            'tipo' => $request->tipo,
        ]);
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'tipo' => 'required',
        ]);


        $user = User::findOrFail($request->user_id);

        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        $professional = $user->profissional()->firstOrCreate([]);


        $professional->update([
            'nome' => $request->nome,
            'titulo' => $request->titulo,
            'endereco' => $request->endereco,
            'instragan' => $request->instragan,
            'facebook' => $request->facebook,
            'sobre' => $request->sobre,
            'status' => $request->status,
            'tipo' => $request->tipo,
        ]);



        // Fazer upload das fotos principais
        if ($request->hasfile('fotos_principais')) {
            foreach ($request->file('fotos_principais') as $file) {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('/imagens/profissionais/');
                $file->move($path, $filename);

                ProfissionalGallery::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'type' => 'foto_principal',
                    ],
                    [
                        'image' => $filename,
                    ]
                );
            }
        }

        // Fazer upload das fotos do slider
        if ($request->hasfile('fotos_slider')) {
            $uploadedFiles = [];



            foreach ($request->file('fotos_slider') as $key => $file) {
                $filename = time() . $key . '.' . $file->getClientOriginalExtension();
                $path = public_path('/imagens/profissionais/');
                $file->move($path, $filename);

                $uploadedFiles[] = $filename; // Armazena os nomes dos arquivos carregados em um array
            }

            // Após percorrer o loop, insira os registros no banco de dados
            foreach ($uploadedFiles as $filename) {
                ProfissionalGallery::create([
                    'user_id' => $user->id,
                    'image' => $filename,
                    'type' => 'foto_slider',  // por exemplo
                ]);
            }
        }

        return redirect()->route('profissional.profile', ['id' => $user->id]);
    }
}

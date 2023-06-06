<?php

namespace App\Http\Controllers;

use App\Models\ProfissionalGallery;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{
    use UploadTrait;

    protected $pageTitle = 'Profissionais';
    protected $view = 'profissionais';
    protected $route = 'profissionais';
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
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


    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
        ]);


        $user = User::findOrFail($request->user_id);

        $user->update([
            'email' => $request->email,
            'telefone' => $request->telefone,
        ]);

        $professional = $user->profissional()->firstOrCreate([]);


        $professional->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'instragan' => $request->instragan,
            'facebook' => $request->facebook,
            'sobre' => $request->sobre,

        ]);

        // Fazer upload das fotos principais
        if ($request->hasfile('fotos_principais')) {
            foreach ($request->file('fotos_principais') as $file) {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('/imagens/profissionais/');
                $file->move($path, $filename);

                ProfissionalGallery::create([
                    'user_id' => $user->id,
                    'image' => $filename,
                    'type' => 'foto_principal',  // por exemplo
                ]);
            }
        }

        // Fazer upload das fotos do slider
        if ($request->hasfile('fotos_slider')) {
            foreach ($request->file('fotos_slider') as $file) {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('/imagens/profissionais/');
                $file->move($path, $filename);

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

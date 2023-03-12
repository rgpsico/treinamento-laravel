<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\Profile;
use App\Models\ProfilePermissoes;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $model;
    protected $pageTitle = 'Profile';

    public function __construct(Profile $profile)
    {
        $this->model = $profile;
    }
    public function index()
    {
        $model = $this->model->all();
        $pageTitle = $this->pageTitle;
        return  view('profile.index', compact('model', 'pageTitle'));
    }

    public function create()
    {
        return  view('profile.create');
    }

    public function edit($id)
    {
        $data = Profile::find($id);
        return  view('profile.create')->with('data', $data);
    }

    public function addPermissoes($id)
    {
        $data = Profile::find($id);
        $profile = ProfilePermissoes::where('profile_id', $id)->get();

        $permissoes = Permissoes::all();

        return  view('profile.addPermissoes', compact('data', 'permissoes'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $result = $this->model->create($data);

        if ($result) {
            return  view('profile.create')->with("success", 'Profile cadastrado com sucesso');
        }
    }

    public function addProfileAndPermissao(Request $request)
    {
        // Salvar o perfil selecionado
        $profile_id = $request->input('profile_id');

        // Salvar as permissões selecionadas
        $permissao_ids = $request->input('permissao_id');


        foreach ($permissao_ids as $permissao_id) {

            $profile_permissao = new ProfilePermissoes;
            $profile_permissao->profile_id = $profile_id;
            $profile_permissao->permission_id = $permissao_id;
            $result = $profile_permissao->save();
        }


        // Redirecionar de volta para a página do perfil
        if ($result) {
            return  view('profile.create')->with("success", 'Profile cadastrado com sucesso');
        }
    }

    public function update($id, Request $request)
    {
        $profile = Profile::find($id);

        $result = $profile->update($request->all());

        if ($result) {
            return  redirect()->route('profile.edit', ['id' => $id])->with("success", 'Profile Editado com sucesso');
        }
    }


    public function destroy($id)
    {
        if ($profile = Profile::find($id)) {
            $profile->delete();

            return redirect()->back()->with(['success' => 'Perfil deletado com sucesso']);
        }
    }
}

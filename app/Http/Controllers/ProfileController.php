<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }
    public function index()
    {
        $data = $this->profile->all();
        return  view('profile.index')->with('data', $data);
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
        $permissoes = Permissoes::all();
        return  view('profile.addPermissoes', compact('data','permissoes'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $result = $this->profile->create($data);

       if($result){
            return  view('profile.create')->with("success", 'Profile cadastrado com sucesso');
       }
       
    }

    public function update($id, Request $request)
    {
        $profile = Profile::find($id);
        
        $result = $profile->update($request->all());

       if($result){
            return  redirect()->route('profile.edit',['id' => $id])->with("success", 'Profile Editado com sucesso');
       }
       
    }
}

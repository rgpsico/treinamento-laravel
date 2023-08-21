<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    protected $model;
    protected $view = 'evento';
    protected $pageTitle = 'Eventos';
    protected $route = 'evenetos';
    public function __construct(Eventos $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $model = $this->model::all(['id', 'titulo', 'descricao', 'data_evento']);
        $pageTitle = $this->pageTitle;
        return view('evento.index')->with(['model' => $model, 'pageTitle' => $pageTitle, 'route' => 'evento']);
    }

    public function create()
    {

        return view($this->view . '.create', ['route' => 'evento', 'pageTitle' => 'Criar Evento']);
    }

    public function edit($id)
    {

        $pageTitle = 'Evento';

        if ($model = $this->model->where('id', $id)->first()) {
            return view($this->view . '.create', compact('model', 'route', 'pageTitle'));
        }
    }

    public function update(Request $request, $id)
    {

        $model = $this->model::findOrFail($id); // Busca o model pelo ID ou lança uma exceção se não encontrá-lo
        $model->titulo = $request->titulo;
        $model->descricao = $request->descricao;
        $model->save();

        return redirect()->back()
            ->with('success', 'Item atualizado com sucesso.');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_evento' => 'required|date',
            'local' => 'nullable|string|max:255',
            'capacidade' => 'nullable|integer|default:200'
        ]);

        $data['capacidade'] = $data['capacidade'] ?? 200;

        $data['user_id'] = auth()->id();

        Eventos::create($data);

        return redirect()->route('evento.index')
            ->with('success', 'Item  criado com sucesso.');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();
        return redirect()->back()->with(['success' => 'Item deleteado com sucesso']);
    }
}

<?php

namespace App\Http\Livewire\Admin\Profissionais;

use App\Models\ProfissionalTipo;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Lista extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tipo;
    public $place;
    public $price;
    public $todos = false;
    public $qualificado;
    public $ordem;

    protected $queryString = ['search', 'tipo'];

    protected $listeners = ['todos' => 'todos'];

    public function render()
    {

        $tipos = ProfissionalTipo::pluck('nome', 'id')->all();
        $tipos = ['' => 'Selecione'] + $tipos;


        $model = User::with('fotosPrincipais')
            ->whereHas('profissional', function ($query) {
                $query->where('profissional.status', 1);
            })
            ->select('id', 'name', 'email', 'telefone', 'avatar');


        if ($this->search) {
            $model->where(function ($query) {
                $query->where("name", "like", $this->search);
            });
        }


        if ($this->tipo && $this->tipo != '') {
            $model->whereHas('profissional', function ($query) {
                $query->where('tipo', $this->tipo);
            });
        }

        if ($this->place) {
            $model->where(function ($query) {
                $query->where("telefone", "like", $this->place);
            });
        }


        $countLeads = $model->count();

        if ($this->ordem == 'desc' || $this->ordem == 'asc') {
            $model = $model->orderBy('id', $this->ordem);
        } else {

            $model = $model->orderBy('name');
        }


        if ($this->todos) {
            $model = $model->paginate(null);
        } else {
            $model = $model->paginate(10);
        }


        return view('livewire.public.profissionais.index', compact('model', 'tipos'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

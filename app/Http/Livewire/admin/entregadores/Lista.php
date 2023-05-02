<?php

namespace App\Http\Livewire\Admin\Entregadores;

use App\Models\Imovel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Lista extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $type;
    public $place;
    public $price;
    public $todos = false;
    public $qualificado;
    public $ordem;

    protected $queryString = ['search'];

    protected $listeners = ['todos' => 'todos'];

    public function render()
    {

        $model = User::entregadoresAtivos()->select('id', 'name', 'email', 'telefone', 'avatar');



        if ($this->search) {
            $model->where(function ($query) {
                $model = $query->where("name", "like", $this->search);
            });
        }

        if ($this->place) {
            $model->where(function ($query) {
                $model = $query->where("telefone", "like", $this->place);
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



        return view('livewire.public.entregadores.index', compact('model'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

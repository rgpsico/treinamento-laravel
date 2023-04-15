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

        $datas = User::select('id', 'name', 'email', 'telefone', 'avatar');


        if ($this->search) {
            $datas->where(function ($query) {
                $datas = $query->where("name", "like", $this->search);
            });
        }

        if ($this->place) {
            $datas->where(function ($query) {
                $datas = $query->where("telefone", "like", $this->place);
            });
        }




        $countLeads = $datas->count();

        if ($this->ordem == 'desc' || $this->ordem == 'asc') {
            $datas = $datas->orderBy('id', $this->ordem);
        } else {

            $datas = $datas->orderBy('name');
        }


        if ($this->todos) {
            $datas = $datas->paginate(null);
        } else {
            $datas = $datas->paginate(10);
        }



        return view('livewire.public.entregadores.index', compact('datas'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

<?php

namespace App\Http\Livewire\Admin\Comercio;

use App\Models\Comercio;
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

        $datas = Comercio::select('id', 'nome', 'telefone')->where('status', 0);


        if ($this->search) {
            $datas->where(function ($query) {
                $datas = $query->where("nome", "like", $this->search);
            });
        }





        $countLeads = $datas->count();

        if ($this->ordem == 'desc' || $this->ordem == 'asc') {
            $datas = $datas->orderBy('id', $this->ordem);
        } else {

            $datas = $datas->orderBy('nome');
        }


        if ($this->todos) {
            $datas = $datas->paginate(null);
        } else {
            $datas = $datas->paginate(10);
        }



        return view('livewire.public.comercio.index', compact('datas'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

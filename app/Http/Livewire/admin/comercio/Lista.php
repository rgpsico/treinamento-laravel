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

        $model = Comercio::select('id', 'nome', 'telefone', 'logo')->where('status', 0);


        if ($this->search) {
            $model->where(function ($query) {
                $model = $query->where("nome", "like", $this->search);
            });
        }





        $countLeads = $model->count();

        if ($this->ordem == 'desc' || $this->ordem == 'asc') {
            $model = $model->orderBy('id', $this->ordem);
        } else {

            $model = $model->orderBy('nome');
        }


        if ($this->todos) {
            $model = $model->paginate(null);
        } else {
            $model = $model->paginate(10);
        }



        return view('livewire.public.comercio.index', compact('model'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

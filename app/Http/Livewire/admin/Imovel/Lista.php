<?php

namespace App\Http\Livewire\Admin\Imovel;

use App\Models\Imovel;
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

        $datas = Imovel::with('gallery')->select('id', 'title', 'description', 'price', 'avatar')->where('status_admin', 0);


        if ($this->search) {
            $datas->where(function ($query) {
                $datas = $query->where("title", "like", $this->search);
            });
        }

        if ($this->place) {
            $datas->where(function ($query) {
                $datas = $query->where("address", "like", $this->place);
            });
        }

        if ($this->type) {
            $datas->where(function ($query) {
                $query->where("type", "=", $this->type);
            });
        }

        if ($this->price) {
            $datas->where(function ($query) {
                $query->where("price", ">=", $this->price);
            });
        }


        $countLeads = $datas->count();

        if ($this->ordem == 'desc' || $this->ordem == 'asc') {
            $datas = $datas->orderBy('id', $this->ordem);
        } else {

            $datas = $datas->orderBy('title');
        }


        if ($this->todos) {
            $datas = $datas->paginate(null);
        } else {
            $datas = $datas->paginate(10);
        }



        return view('livewire.public.imovel.index', compact('datas'));
    }


    public function todos()
    {
        $this->todos = true;
        $this->setPage(1);
    }
}

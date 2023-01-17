<?php

namespace App\Http\Livewire;

use App\Models\Imovel;
use Livewire\Component;
use Livewire\WithPagination;

class Listagem extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $tipo;
    public $qualificado;
    public $ordem;

    protected $queryString = ['search'];

    public function render()
    {

        $datas = Imovel::select('id','title');

      
        if($this->search)
        {
            $datas->where(function ($query)
            {
               $datas =  $query->orWhere('title', 'like', '%'.$this->search.'%');
            });
        }
         
         $countLeads = $datas->count();

        if($this->ordem == 'desc' || $this->ordem == 'asc')
        {
            $datas = $datas->orderBy('id', $this->ordem);
        
        } else {

            $datas = $datas->orderBy('title');
        }


        $datas = $datas->paginate(25);
      
        return view('livewire.listagem', compact('datas'));
    }
}

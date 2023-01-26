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
    public $type;
    public $qualificado;
    public $ordem;

    protected $queryString = ['search'];

    public function render()
    {

        $datas = Imovel::select('id','title','description', 'price', 'avatar');

      
        if($this->search)
        {
            $datas->where(function ($query)
            {
                $datas = $query->where("title", "like", $this->search);
            });
        }

        if($this->type)
        {
            $datas->where(function ($query)
            {
               $query->where("type", "=", $this->type);
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

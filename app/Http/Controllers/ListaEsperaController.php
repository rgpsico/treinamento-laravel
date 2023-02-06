<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ListaEspera;
use App\Models\ListaEsperaImovel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class ListaEsperaController extends Controller
{

    protected $view = 'listaespera';
    protected $route = 'espera';
    protected $model;
    protected $lista;

    public function __construct( 
    ListaEspera $model, 
    ListaEsperaImovel $lista )
    {
        $this->model = $model;
        $this->lista = $lista;
    }
   
    public function index(Request $request)
    {
       $model = $this->model::paginate();
        return view($this->view.'.index', compact('model'),  
        ['request' => $request,
           'route' => $this->route
    
    ]);
    }

   
    public function show($id)
    {
   
       $this->model::find($id);
       return view($this->view.'.show', compact('category'));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view($this->view.'.create');
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($model = $this->model::where('id', $id)->first()){
           
            return view($this->view.'.create',[
                'model' => $model
            ]);
        }
  
    }

    public function update(Request $request, $id)
    {
        // Valide os dados de entrada
        $request->validate([
            'name' => 'required|max:255',
           
        ]);

       
        $model = $this->model::findOrFail($id);

        // Atualize os dados do imóvel
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->place = $request->input('place');
          
        $model->save();

        // Redirecione o usuário de volta para a página de exibição de imóveis
        return redirect()->back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $model = $this->model;
        $model->name = $request->name;
        $model->description = $request->description;     
        $model->place = $request->place;  

        if($model->save())
        {
            return redirect()->back();
        }
    }



    public function storeApi(Request $request)
    {
        $imovelLista = $this->lista;
        $imovelLista->user_id = $request->user_id;
        $imovelLista->imovel_id = $request->imovel_id;     
    

        if($imovelLista->save())
        {
            return redirect()->back();
        }
    }
   



   
    public function destroy($id)
    {
        if($model = Category::where('id', $id)->first()){
                     
            $model->destroy($id);
            
            return redirect()->route('category.index',[
                'id' =>$model->id
            ])
            ->with('success','Imovel foi excluido com sucesso');
        }
    }


  

}

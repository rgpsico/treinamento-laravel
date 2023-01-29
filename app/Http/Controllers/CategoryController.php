<?php

namespace App\Http\Controllers;




use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;


class CategoryController extends Controller
{

    protected $view = 'category';

    
    public function index(Request $request)
    {
       $model = Category::paginate();
        return view($this->view.'.index', compact('model'),  ['request' => $request]);
    }

    
   

    public function show($id)
    {
       
       $category = Category::find($id);

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
        if($data = Category::where('id', $id)->first()){
            
            return view($this->view.'.edit',[
                'data' => $data
            ]);
        }
  
    }

    public function update(Request $request, $id)
    {
        // Valide os dados de entrada
        $request->validate([
            'name' => 'required|max:255',
           
        ]);

       
        $category = Category::findOrFail($id);

        // Atualize os dados do imóvel
        $category->name = $request->input('name');
        $category->description = $request->input('description');

          
        $category->save();

        // Redirecione o usuário de volta para a página de exibição de imóveis
        return redirect()->route($this->view.'.edit', ['id' => $category->id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;     
       

        if($category->save())
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

<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\ProductsImagens;
use App\Models\Produtos;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    use UploadTrait;
    protected $data;
    protected $pageTitle = 'Produtos';

    public function __construct(Produtos $produtos)
    {
        $this->data = $produtos;
    }
    public function index()
    {
        $model = $this->data->all();
        $pageTitle = $this->pageTitle;
        return  view('produtos.index', compact('model', 'pageTitle'));
    }

    public function create()
    {
        return  view('produtos.create');
    }

    public function edit($id)
    {
        $data =  $this->data::find($id);
        return  view('produtos.create')->with('data', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();


        if ($request->hasFile('imagemProduto')) {

            $imagemProduto = $request->file('imagemProduto');
            $result = $this->data->create($data);
            foreach ($imagemProduto as $prod) {

                $filename = time() . '.' . $prod->getClientOriginalExtension();

                $path = public_path('/imagens/produtos/');
                $prod->move($path, $filename);

                $imagem = new ProductsImagens();
                $imagem->product_id = $result->id;
                $imagem->image_path = $filename;
                $imagem->save();
            }
        }



        if ($result) {
            return redirect()->route('produtos.create')
                ->with(['success' => 'Produto criado  com sucesso']);
        }
    }

    public function update($id, Request $request)
    {
        $Permissoes = $this->data::find($id);

        $result = $Permissoes->update($request->all());

        if ($result) {
            return  redirect()->route('produtos.edit', ['id' => $id])->with("success", 'Permissoes Editado com sucesso');
        }
    }

    public function destroy($id)
    {
        $permissao = $this->data::findOrFail($id);
        $permissao->delete();
        return  redirect()->route('produtos.index')->with("success", 'Permissoes Excluida com sucesso');
    }
}

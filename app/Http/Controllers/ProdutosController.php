<?php

namespace App\Http\Controllers;

use App\Models\Permissoes;
use App\Models\ProductsImagens;
use App\Models\Produtos;
use App\Models\UserProdutos;
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

    public function meusProdutos()
    {
        $usuarioId = Auth::id(); // Obter o ID do usuário autenticado
        $model = $this->data->doUsuario($usuarioId)->get();
        $pageTitle = $this->pageTitle;
        return view('produtos.index', compact('model', 'pageTitle'));
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

        $result = $this->data->create($data);

        $userProduct = new UserProdutos;
        $userProduct->user_id = Auth::user()->id;
        $userProduct->product_id = $result->id;
        $userProduct->quantity = 5;
        $userProduct->save();

        if ($request->hasFile('imagemProduto')) {

            $imagemProduto = $request->imagemProduto;

            foreach ($request->allFiles() as $prod) {

                $filename = time() . '.' . $prod->getClientOriginalExtension();

                // Correção: use DIRECTORY_SEPARATOR para garantir compatibilidade entre sistemas operacionais
                $path = public_path('imagens' . DIRECTORY_SEPARATOR . 'produtos');

                // Correção: Certifique-se de que o diretório exista e seja gravável
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $prod->move($path, $filename);





                $imagem = new ProductsImagens(); // Correção: use o nome correto do modelo (ProductImage)
                $imagem->product_id = $result->id;
                $imagem->image_path = 'imagens' . DIRECTORY_SEPARATOR . 'produtos' . DIRECTORY_SEPARATOR . $filename; // Correção: inclua o diretório relativo no caminho da imagem
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

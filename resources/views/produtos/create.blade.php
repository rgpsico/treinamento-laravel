@extends('layouts.app')

@section('content')


<x-alert/>

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Adicionar Produtos</h3>
            </div>


            <form action="{{route('produtos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">                                    
                    <div class="form-group">
                        <label for="andress">Nome Produto</label>
                        <input type="text" class="form-control" id="name"  name="name" placeholder="Qual o anuncio" value="TESTE">
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input type="text" class="form-control" id="description"  name="description" placeholder="Descrição" value="TESTE DESC">
                    </div>

                    <div class="form-group">
                        <label for="address">Preço</label>
                        <input type="integer" class="form-control" id="price"  name="price" placeholder="Preço do produto" value="10">
                    </div>

                    <div class="form-group">
                        <label for="address">Quantidade</label>
                        <input type="integer" class="form-control" id="quantity"  name="quantity" placeholder="Quantidade" value="10">
                    </div>
                    
                    
                        <div class="form-group">
                            <label for="imagemProduto">Imagens</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" multiple name="imagemProduto" id="imagemProduto">

                                        <label class="custom-file-label" for="imagemProduto">Escolher fotos</label>
                                    
                                </div>
                        </div>
                   </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>


@endsection

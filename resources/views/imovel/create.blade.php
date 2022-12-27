@extends('layouts.app')

@section('content')


@if(session()->has('success'))
<div class="row">
    <div class=" col-12 alert alert-success">
        {{ session()->get('success') }}
    </div>
</div>
@endif

    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Adicionar Casa</h3>
            </div>


            <form action="{{route('imovel.store')}}" method="POST">
                @csrf
                <div class="card-body">

                    
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo</label>
                        <select name="type" id="type"  name="type" class="form-control">
                            <option value="0" class="form-control">Casa</option>
                            <option value="1" class="form-control">KitNet</option>
                        </select>          
                    </div>
                    
                    <div class="form-group">
                        <label for="andress">Titulo do Anuncio</label>
                        <input type="text" class="form-control" id="title"  name="title" placeholder="Qual o anuncio" value="TESTE">
                    </div>

                    <div class="form-group">
                        <label for="description">Endereço</label>
                        <input type="text" class="form-control" id="description"  name="description" placeholder="Descrição" value="TESTE DESC">
                    </div>

                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" id="address"  name="address" placeholder="Enter email" value="TESTE">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Valor</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="valor ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagens</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Escolher fotos</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Enviar Imagens</span>
                            </div>
                        </div>
                    </div>
                   </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>


@endsection

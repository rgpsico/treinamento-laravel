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


            <form action="{{route('imovel.update',['id' => $data->id])}}" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo</label>
                        <select name="type" id="type"  name="type" class="form-control">
                            <option value="0"  {{$data->type == 0 ? 'selected' : ''}} class="form-control">Casa</option>
                            <option value="1"  {{$data->type == 1 ? 'selected' : ''}} class="form-control">KitNet</option>
                        </select>          
                    </div>
                    
                    <div class="form-group">
                        <label for="andress">Titulo do Anuncio</label>
                        <input type="text" class="form-control" id="title"  name="title" value="{{$data->title}}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Endereço</label>
                        <input type="text" class="form-control" id="description"  name="description" value="{{$data->address}}" >
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Valor</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{$data->price}}">
                    </div>
                        <div class="form-group">                      
                            <input type="file" name="avatar[]"  id="avatar">
                        </div>
                        <div class="input-group-append">
                            <img src="{{ asset('imagens/imoveis/'.$data->avatar) }}"  height="200px" width="200px"/>
                        </div>
                    </div>
                    </div>
                   </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>

       <!-- Javascript Requirements -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        {!! JsValidator::formRequest('App\Http\Requests\ImoveisRequest', '#myForm') !!}

        
@endsection

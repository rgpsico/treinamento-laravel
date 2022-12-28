@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                      
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Cadastrar Imovel</li>
                        </ol>
                    </div>
                </div>
                <a class="btn btn-success" 
                style="font-size:12px; height:30px; width:120px;"
                href="{{ route('imovel.create') }}
                ">Cadastrar Imovel</a>
            </div>
        </section>        
         
        
    </div>



    <div class="col-md-12 my-5">
        <form method="GET" action="{{ route('imovel.search') }}">
            @csrf
            <div class="form-row">
                <div class="col-3">
                    <label for="tipo">Tipo:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0" {{ $request->input('type') == '0' ? 'selected' : '' }}>Kitnet</option>
                        <option value="1" {{ $request->input('type') == '1' ? 'selected' : '' }}>Casa</option>
                    </select>
                </div>

                {{-- <div class="col-3">
                <label for="comunidade">Comunidade:</label>
                <select name="comunidade" id="comunidade" class="form-control">
                  <option value="">Selecione</option>
                  <option value="cantagalo">Cantagalo</option>
                  <option value="pavão">Pavão</option>
                </select>
              </div> --}}

                {{-- <div class="col-4">
                <label for="tamanho">Tamanho:</label>
                <select name="tamanho" id="tamanho" class="form-control">
                  <option value="">Selecione</option>
                  <option value="1">1 quarto</option>
                  <option value="2">2 quartos</option>
                </select>
              </div> --}}
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:35px; height:30px;font-size:12px;">Filtrar</button>
            </div>


        </form>

    </div>
    </div>

    <div class="card-group">

        @foreach ($data as $value)
     
            <div class="col-12 col-md-4">
                <div class="card">
                    @if(isset($value->gallery[0]) && !is_null($value->gallery[0]))
                        <img src="{{ asset('imagens/imoveis/'.$value->gallery[0]->image) }}"
                
                        class="card-img" style="height:200px;">
                        @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $value->title ?? '' }}</h5>
                        <p class="card-text">Preço: R${{ $value->price ?? '' }}</p>
                        <p class="text-color-red"> {{ $value->type == 1 ? 'Casa' : 'KitNet' }}</p>
                        <span class="">{{ $value->data_created ?? '' }}</span>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="{{ route('imovel.show', ['id' => $value->id]) }}"class="">Ver
                            imovel</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')



@section('content')

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                               
                        <img src="{{ asset('imagens/imoveis/'.$data->avatar) }}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach($galleries as $gallery)
                            <div class="product-image-thumb">
                                <img src="{{ asset('imagens/imoveis/'.$gallery->image) }}" alt="Product Image"></div>
                            @endforeach
                     </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$data->title}}</h3>
                    <p>{{$data->description}}</p><hr>
                     
                    
                    <div class="btn-group btn-group-toggle" data-toggle="buttons"></div>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            R$ {{$data->price}} Mensal
                        </h2>
                       
                    </div>
                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                           Ligar
                        </div>
                       
                    </div>
                 
                </div>
            </div>
           
        </div>

    </div>
    
@endsection

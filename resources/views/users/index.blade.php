@extends('layouts.app')

@section('content')

<h1>Listar Casas</h1>
<div class="card-group">
   @foreach ($data as $value)
       

   
   <div class="col-3">  
        <div class="card">
            <img src="https://img.clasf.com.br/2020/03/06/Kitnets-novas-na-Voldac-A-partir-de-R-500-00-20200306184600.7157950015.jpg" class="card-img" style="height:200px;">
            <div class="card-body">
                <h5 class="card-title">{{$value->title ?? ''}}</h5>
                <p class="card-text">Preço: R${{$value->price ?? ''}}</p>
                <span class="">{{$value->data_created ?? ''}}</span>
            </div>
            <div class="card-footer">
                <a class="btn btn-success"  href="{{route('imovel.show',['id' => $value->id])}}"class="">Ver imovel</a>
            </div>
        </div>
      
    </div>
 
    @endforeach
</div>

@endsection

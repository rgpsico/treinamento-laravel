@extends('layouts.masteblack')
@section('content')
<!-- Slider -->
@include('novo._partials.slider')
  <!-- Categories -->
 @include('novo._partials.servicoscomponent')
  <!-- End Categories --> 
  
  <!-- Featured_ads -->
  <section class="featured_ads bg-light">
    <div class="container"> 
      <!-- Row  -->
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="title">Anúncios</h2>
          <h6 class="subtitle">Explore os melhores lugares da cidade.</h6>
        </div>
      </div>
      <!-- Row  -->
      <div class="row">
      
        @foreach ($datas as $data )
            
   
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
          <div class="featured-parts rounded m-t-30">
            <a href="{{route('detalhes',['id' =>$data->id ])}}">
                <div class="featured-img"> 
                    <img class="img-fluid rounded-top" 
                    src="{{ asset('imagens/imoveis/'.$data->avatar) }}" alt="{{$data->title}}"/> 
                </div>
            </a>
            <div class="featured-text">
              <div class="text-top d-flex justify-content-between">
                <div class="heading"> 
                    <a href="{{route('detalhes',['id' =>$data->id ])}}">{{$data->title}}</a> </div>
                <div class="book-mark">
                    <a href="{{route('detalhes',['id' =>$data->id ])}}">
                    <i class="fa fa-bookmark"></i></a>
                </div>
              </div>
              <div class="text-stars m-t-5">
                <p>{{$data->description}}</p>
                <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i> 
                 <i class="fa fa-star"></i> 
                  <i class="fa fa-star"></i>
                 <i class="fa fa-star"></i> 
                </div>
              <div class="featured-bottum m-t-30">
                <ul class="d-flex justify-content-between list-unstyled m-b-20">
                  <li><a href="#">
                    <i class="fa fa-map-marker"></i> {{$data->address}}</a></li>
                  <li><a href="#">
                    <i class="fa fa-heart-o"></i> Save</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  

        <button class="view-btn hvr-pulse-grow" type="submit" value="button">Ver todos</button>
      </div>
    </div>
  </section>

  
  @endsection
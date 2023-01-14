
@extends('layouts.master')
<!-- Categories -->
@section('content')

@include('novo._partials.banner')
<!-- Categories -->
<section class="top_listings">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center">
<div class="col-md-7 text-center">
  <h2 class="title">Selecione o que você quer </h2>
</div>
</div>
<!-- Row  -->
<div class="row">
<form class="top_listings_search">
              <div class="form-group">
                <input class="form-control text-truncate" placeholder="Keywords" type="email">
              </div>
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>All categories</option>
                
                </select>
              </div>
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>Posted By</option>
                  </select>
              </div>
              
              <div class="form-group selectdiv">
                <select class="form-control text-truncate">
                  <option>Price Range</option>
                  <option>Vehicles</option>
                  <option>Electronics</option>
                  <option>Mobiles</option>
                  <option>Furniture</option>
                  <option>Fashion</option>
                  <option>Real Estate</option>
                  <option>Animals</option>
                  <option>Education</option>
                  <option>Baby products</option>
                  <option>Services</option>
                  <option>Furniture</option>
                </select>
              </div>
            </form>
</div>
<div class="row">
  @foreach ($datas as $data)

<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
  <div class="featured-parts rounded m-t-30">
    <a href="{{route('detalhes',['id' =>$data->id ])}}">
      <div class="featured-img">
        <img class="img-fluid rounded-top" 
        src="{{ asset('imagens/imoveis/'.$data->avatar) }}" alt="{{$data->title}}">
        <div class="featured-new bg_warning1"> 
          <a href="#"> Novo </a> 
        </div>
      </div>
     </a>
    <div class="featured-text">
      <div class="text-top d-flex justify-content-between ">
        <div class="heading"> 
          <a href="#">{{$data->title }}</a> 
        </div>
        <div class="book-mark">
          <a href="#">
            <i class="fa fa-bookmark">

            </i>
        </a>
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
            <i class="fa fa-map-marker"></i> {{$data->address}}</a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-heart-o">
                </i> Salvar
              </a> 
          </li>
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


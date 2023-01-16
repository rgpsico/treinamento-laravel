@extends('layouts.masteblack')
@section('content')
<!-- Slider -->
@include('novo._partials.slider')
  <!-- Categories -->

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
     @include('novo.components.listagemComponent')
  

        <button class="view-btn hvr-pulse-grow" type="submit" value="button">Ver todos</button>
      </div>
    </div>
  </section>

  
  @endsection
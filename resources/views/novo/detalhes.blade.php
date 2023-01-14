@extends('layouts.master')
<!-- Categories -->
@section('content')
   
<!-- Detail_part -->
<section class="detail_part m-t-50">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="detail_box"> 
          <img class="img-fluid" src="{{ asset('imagens/imoveis/'.$data->avatar) }}" alt="{{$data->title}}">
          <div class="m-t-20">
            <ul class="owl-carousel list-unstyled m-b-0" id="product_slider">
            
              @foreach ($data->gallery as $key => $gallery ) 
                    <li> <img class="img-fluid" src="{{ asset('imagens/imoveis/'.$data->gallery[$key]->image) }}" alt="slide {{$key}}"> </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="detail_box">
          <div class="detail_head">
            <h3> {{$data->title}}<br>
               </h3>
            <p>{{$data->description}} </p>
            <ul class="list-unstyled text-capitalize m-b-0 m-t-15">
              <li class="d-inline-block p-r-20">
                <a href="#"> 
                  <i class="fa fa-clock-o">
                    </i> <span>{{$data->data_created}}</span>
                  </a> 
                  </li>
              <li class="d-inline-block p-r-20">
                <a href="#"> 
                  <i class="fa fa-tags"></i>
                <span> Novo </span></a> 
              </li>
              <li class="d-inline-block">
                <a href="#"> <i class="fa fa-eye"></i> 
                <span> Ver </span> </a> </li>
            </ul>
          </div>
          <ul class="list-unstyled d-inline-block float-left detail_left m-b-0">
            <li>Arcondicionado:</li>
            <li>Vista :</li>
            <li>porão :</li>
            <li>Barulho:</li>
            <li>Aceita criança</li>
          </ul>
          <ul class="list-unstyled d-inline-block m-l-40 detail_right  m-b-0">
            <li>Sim</li>
            <li>Sim</li>
            <li>Não</li>
            <li>Não</li>
            <li>Sim</li>
          </ul>
          <div class="detail_bottum m-t-15">
            <div class="row">
              <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                <div class="form-check">
                  <input class="form-check-input" value="" type="checkbox">
                  <label class="form-check-label"> </label>
                  <img src="{{asset('images/warrenty.png')}}" alt="{{$data->title}}">
                  <div class="warranty d-inline-block">
                    Não precisa de deposito*<br>
                     </div>
                </div>
              </div>
              <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12 col-12">
                <div class="form-check">
                  <input class="form-check-input" value="" type="checkbox">
                  <label class="form-check-label"> </label>
                  <img src="{{asset('images/insurance.png')}}" alt="{{$data->title}}">
                  <div class="warranty d-inline-block">10 minutos da praia<br>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="detail_prize p-t-10">
            <ul class="list-unstyled">
              <li class="d-inline-block pr-3"> Preço Mensal : </li>
              <li class="d-inline-block Price_m"> {{$data->price}}</li>
            </ul>
          </div>
          
          <div class="detail_btn d-flex m-t-20">
            <button class="btn_chat w-100 text-white mr-3 py-2 border-0" type="submit" value="button">
              <a href="https://api.whatsapp.com/send?phone={{$data->user->phone}}" target="_blank" style="color:#fff; text-decoration: none;">
                <i class="fa fa-comment-o"></i> Chamar
              </a>
            </button>
   
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End Description -->

<!-- Description -->
<section class="description">
  <div class="container"> 
    
    <!-- Row  -->
    <div class="row justify-content-left">
      <div class="col-md-7 text-left">
        <h2 class="title">Resumo</h2>
      </div>
    </div>
    <!-- Row  -->
    
    <div class="row">
      <div class="col-md-9">
        <div class="description_box">
          <p>{{$data->description}} </p>
        
      </div>
    </div>
      <div class="col-md-3">
        <div class="single-sidebar"> 
          <img class="add_img img-fluid" src="{{asset('images/google_adds2.png')}}" alt="Classified Plus"> </div>
      </div>
    </div>
  </div>
  
</section>
<!-- End Description --> 

<!-- Top_listings -->
<section class="top_listings">
  <div class="container"> 
    
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center m-b-10">
        <h2 class="title">Patrocinados</h2>
      </div>
    </div>
    <!-- Row  -->
    
    <div class="row">      
      @foreach ($imoveis as $imovel)  
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <a href="{{route('detalhes',['id' => $imovel->id])}}">
        <div class="featured-parts rounded m-t-30">
          <div class="featured-img"> 
            <img class="img-fluid rounded-top" src="{{ asset('imagens/imoveis/'.$imovel->avatar) }}" alt="Classified Plus"> </div>
          <div class="featured-text">
            <div class="text-top d-flex justify-content-between ">
              <div class="heading"> 
                <a href="#">{{$imovel->title}}</a> 
              </div>
              <div class="book-mark">
                <a href="#">
                  <i class="fa fa-bookmark"></i></a>
                </div>
            </div>
            <div class="text-stars m-t-5">
              <p>{{$imovel->description}}</p>
              <i class="fa fa-star"></i>
               <i class="fa fa-star"></i> 
               <i class="fa fa-star"></i> 
               <i class="fa fa-star"></i> 
               <i class="fa fa-star"></i> 
              </div>
            <div class="featured-bottum m-t-30">
              <ul class="d-flex justify-content-between list-unstyled m-b-20">
                <li><a href="#">
                  <i class="fa fa-map-marker">
                  </i> {{$imovel->address}} </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-heart-o"></i> Salvar
                  </a> 
                </li>
              </ul>
            </div>
          </div>
        </div>
      </a>
      </div>
      @endforeach  

    </div>
    <div class="row">
           
        <div class="col-md-12">
    
        <div class="single-sidebar m-b-50 m-t-50 text-center">
           <img class="add_img img-fluid" 
           src="{{asset('images/discount-img.png')}}" 
           alt="{{$data->title}}"> 
          </div>
         
      </div>
    </div>
  </div>
</section>

        <!-- End Testimonial -->
    @endsection

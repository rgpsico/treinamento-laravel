<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Classified Plus</title>
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" />
<link href={{ asset("css/style.css")}} rel="stylesheet">
<link rel="stylesheet" href={{ asset("css/owlcarousel/owl.carousel.min.css")}} />
<link rel="stylesheet" href={{ asset("css/owlcarousel/owl.theme.default.min.css")}} />
</head>
<body class="iner_page">
<div class="topbar"> 
  <!-- Header  -->
  <div class="header">
    <div class="container po-relative">
      <nav class="navbar navbar-expand-lg hover-dropdown header-nav-bar"> 
        <a href="{{route('novo.listar')}}" class="navbar-brand">
          <img src="{{asset('images/logo2.png')}}" alt="Classified Plus"></a>
          <button class="navbar-toggler" 
          type="button" 
          data-toggle="collapse" 
          data-target="#h5-info" 
          aria-expanded="false" 
          aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>

        <div class="collapse navbar-collapse" id="h5-info">
          <ul class="navbar-nav">
            <li class="nav-item dropdown"> 
              <a class="nav-link "
               href="{{route('novo.home')}}" 
              > Home </a>
             
            <li class="nav-item"> 
              <a class="nav-link"  href="{{route('novo.categoria')}}">Serviços</a>
            </li>           
           </ul>

          <div class="header_r d-flex">
            @if (Auth::check())
            <div class="loin"> 
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    Sair
                </a>
        
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <div class="loin"> 
                <a class="nav-link" href="#" data-toggle="modal" data-target="#login">
                    <i class="fa fa-user m-r-5">
                    </i>Registrar/Logar
                </a>  
            </div>
        @endif
        
            <ul class="ml-auto post_ad">
              <li class="nav-item search">
                <a class="nav-link" href="#">Adicionar Casa</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
   @include('layouts.novo.modal')
</div>


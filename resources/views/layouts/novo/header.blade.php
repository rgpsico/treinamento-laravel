<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/owlcarousel/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('css/owlcarousel/owl.theme.default.min.css') }} />

    
</head>

<body class="iner_page">
    <div class="topbar">
        <!-- Header  -->
        <div class="header">
            <div class="container po-relative">
                <nav class="navbar navbar-expand-lg hover-dropdown header-nav-bar">
                    <a href="{{ route('listar.imoveis.public') }}" class="navbar-brand">
                        <img src="{{ asset('images/logo2.png') }}" alt="Classified Plus"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h5-info"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="h5-info">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown"> 
                                <a class="nav-link dropdown-toggle show" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Listas </a>
                                <ul class="b-none dropdown-menu font-14 animated fadeInUp hidden">
                                  <li><a class="dropdown-item" href="{{ route('listar.imoveis.public') }}">Imoveis </a></li>
                                  <li><a class="dropdown-item" href="{{ route('listar.profissionais.public') }}">Profissionais </a></li>
                                  <li><a class="dropdown-item" href="{{ route('listar.entregadores.public') }}">Entregadores </a></li>
                                  <li><a class="dropdown-item" href="{{ route('listar.comercio.public') }}">Comércio </a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('novo.categoria') }}">Serviços</a>
                            </li>

                            <li class="nav-item"> 
                                <a class="nav-link" href="{{ route('comercio.registerHome') }}">Cadastrar Comercio</a>
                             </li>

                            @if (!Auth::check())
                            <li class="nav-item dropdown"> 
                                <a class="nav-link dropdown-toggle show" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Registro </a>
                                <ul class="b-none dropdown-menu font-14 animated fadeInUp hidden">                                       
                                  <li><a class="dropdown-item" href="{{ route('user.create') }}">Sou Profissional </a></li>
                                  <li><a class="dropdown-item" href="{{ route('user.registerAmigo') }}">Quero registrar um Profissional </a></li>
                                
                                </ul>
                            </li>
                             @endif 
                            
                              @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('imovel.users', ['user_id' => Auth::user()->id]) }}">Painel</a>
                                </li>
                                @else 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                                </li>
                            @endif
                        </ul>

                        <div class="header_r d-flex">
                            @if (Auth::check())
                                <div class="loin">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="GET"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @else
                                {{-- <div class="row join" style="padding-left: 20px"> 
         
          <div class="col-3">
              <a class="nav-link text-dark" href="{{route('user.login')}}" >
                  <i class="fa fa-user m-r-5 ">
                  </i>Logar
              </a> 
          </div>
          <div class="col-3">
              <a class="nav-link text-dark" href="{{route('user.create')}}" >
                  <i class="fa fa-plus m-r-5 ">
                  </i>Registrar
              </a> 
          </div>
      </div> --}}
                            @endif
                            @if (Auth::check())
                                <ul class="ml-auto post_ad">
                                    <li class="nav-item search">
                                        <a class="nav-link" href="{{ route('imovel.create') }}">Adicionar Casa</a>
                                    </li>
                                </ul>
                            @endif


                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @include('layouts.novo.modal')
    </div>

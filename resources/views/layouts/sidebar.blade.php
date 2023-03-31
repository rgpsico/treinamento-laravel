<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imoveis PPG</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>
    #navbarToggleExternalContent {
        transform: translateX(-100%);
        transition: transform .35s ease;
        display: block;
        height: 100%;
        min-height: 100%;
    }

    #navbarToggleExternalContent.menu-show {
        transform: translateX(0%);
    }

    .header {
        display: flex;
        align-items: center;
    }

    .name,
    .email {
        margin-right: 20px;
    }

    @media (max-width: 768px) {

        .name,
        .email {
            display: none;
        }
    }
</style>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav" id="navbar-nav_bt">
                <li class="nav-item">
                    <a class="nav-link " data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars" id="menu-icon"></i>
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        Sair
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Buscar"
                                    aria-label="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">

                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#0f172a;">



            <div class="sidebar">
                <div class="row my-4 ml-2 nav-treeview">
                    <div class="col-8">
                        <img src="https://angular-material.fusetheme.com/assets/images/logo/logo.svg" width="20px"
                            height="20px" alt="">
                    </div>
                    <div class="col-4 d-flex justify-content-between nav-treeview ">
                        <i class="fas fa-bell text-white icones"></i>
                        <i class="fas fa-user text-white mr-3 icones"></i>

                    </div>
                </div>



                <div class="row mb-5 my-5 nav-treeview">
                    <div class="col-12 mb-2">
                        <div class="image d-flex justify-content-center align-items-center">
                            <a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}">


                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('/uploads/' . Auth::user()->avatar) }}" alt="Descrição da imagem"
                                        class="img-circle elevation-2 img-fluid scale-down" width="80"
                                        height="80" alt="User Image">
                                @else
                                    <img src="https://angular-material.fusetheme.com/assets/images/avatars/brian-hughes.jpg"
                                        class="img-circle elevation-2 img-fluid scale-down" width="80"
                                        height="80" alt="User Image">
                                @endif




                            </a>
                        </div>
                    </div>

                    <div class="col-12 nav-treeview name">
                        <a href="#" class="d-flex justify-content-center align-items-center small">
                            @if (Auth::check())
                                {{ Auth::user()->name }}.
                            @endif
                        </a>
                    </div>

                    <div class="col-12 email">
                        <a href="#" class="d-flex justify-content-center align-items-center small text-light">
                            @if (Auth::check())
                                {{ Auth::user()->email }}.
                            @endif
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @can('ver_dashboard')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link menuDashboard">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @endcan



                        @can('ver_imoveis')
                            <li class="nav-item menuImoveis open menu-is-opening menu-open">
                                <a href="{{ route('permissoes_categoria.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Imoveis
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('imovel.users', ['user_id' => Auth::user()->id]) }}"
                                            class="nav-link myImoveis">
                                            <p class="ml-3">Meus Imoveis</p>
                                        </a>
                                    </li>

                                </ul>

                                @if (Auth::user()->email == 'rgyr2010@hotmail.com')
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('proprietario.index') }}" class="nav-link proprietario">

                                                <p class="ml-3">Proprietários</p>
                                            </a>
                                        </li>

                                    </ul>
                                @endif

                                <ul class="nav nav-treeview">
                                    @if (Auth::user()->email == 'rgyr2010@hotmail.com')
                                        <li class="nav-item">
                                            <a href="{{ route('imovel.all') }}" class="nav-link">

                                                <p class="ml-3">Todos Imoveis</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>

                                <ul class="nav nav-treeview">
                                    {{-- @can('ver-itens') --}}
                                    <li class="nav-item">
                                        <a href="{{ route('itens.index') }}" class="nav-link itensMenu">

                                            <p class="ml-3">Itens</p>
                                        </a>
                                    </li>
                                    {{-- @endcan --}}

                                </ul>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('espera.index') }}" class="nav-link espera">

                                            <p class="ml-3">
                                                Lista de espera

                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @if (Auth::user()->email == 'rgyr2010@hotmail.com')
                            <li class="nav-item menuAcesso">
                                <a href="" class="nav-link ">

                                    <i class="nav-icon fas fa-key"></i>
                                    <p>
                                        Acesso

                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('permissoes_categoria.index') }}"
                                            class="nav-link permissoesCategoria">

                                            <p class="ml-3">Permissoes Categoria</p>
                                        </a>
                                    </li>

                                </ul>


                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('permissoes.index') }}" class="nav-link menuPermissao">
                                            <p class="ml-3">Permissoes</p>
                                        </a>
                                    </li>

                                </ul>



                                @can('ver_usuarios')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link ">
                                        <i class="nav-icon fas fa-user-circle"></i>
                                        <p>
                                            Usuário

                                        </p>
                                    </a>
                                </li>
                            @endcan


                            <li class="nav-item">
                                <a href="{{ route('depoimento.index') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-user-circle"></i>
                                    <p>
                                        Depoimentos

                                    </p>
                                </a>
                            </li>


                            </li>
                        @endif

                    </ul>
                </nav>

            </div>

        </aside>

        <script>
            const menuIcon = document.getElementById('navbar-nav_bt');
            const name = document.querySelector('.name');
            const email = document.querySelector('.email');
            $('.icones').show();
            menuIcon.addEventListener('click', function() {
                // Mostra o elemento
                $('.icones').toggle(); // Alterna entre mostrar/esconder o elemento

                name.style.display = 'none';
                email.style.display = 'none';

            });


            $(document).ready(function() {

                if (window.location.href.indexOf('imovel/' + {{ Auth::user()->id }} + '/myimoveis') > -1) {
                    $('.myImoveis').addClass('active');
                    $('.propriedade').removeClass('active');
                    $('.itensMenu').removeClass('active');
                }

                if (window.location.href.indexOf('imovel/itens') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.propriedade').removeClass('active');
                    $('.itensMenu').addClass('active');
                    $('.espera').removeClass('active');
                    $('.menuDashboard').removeClass('active')
                }


                if (window.location.href.indexOf('imovel/proprietario') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').addClass('active');
                    $('.espera').removeClass('active');
                    $('.menuDashboard').removeClass('active')
                }

                if (window.location.href.indexOf('admin/espera') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').removeClass('active');
                    $('.espera').addClass('active');
                    $('.menuDashboard').removeClass('active')
                }

                if (window.location.href.indexOf('admin/permissoes') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').removeClass('active');
                    $('.espera').removeClass('active');
                    $('.menuImoveis').removeClass('open menu-is-opening menu-open');
                    $('.menuAcesso').addClass('open menu-is-opening menu-open')
                    $('.menuPermissao').addClass('active')
                    $('.menupermissoes_categoria').removeClass('permissoes_categoria')
                    $('.menuDashboard').removeClass('active')
                }


                if (window.location.href.indexOf('admin/permissoes_categoria') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').removeClass('active');
                    $('.espera').removeClass('active');
                    $('.menuImoveis').removeClass('open menu-is-opening menu-open');
                    $('.menuAcesso').addClass('open menu-is-opening menu-open')
                    $('.menuPermissao').removeClass('active')
                    $('.menupermissoes_categoria').addClass('active')
                    $('.menuDashboard').removeClass('active')
                }

                if (window.location.href.indexOf('dashboard') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').removeClass('active');
                    $('.espera').removeClass('active');
                    $('.menuImoveis').removeClass('open menu-is-opening menu-open');
                    $('.menuAcesso').removeClass('open menu-is-opening menu-open')
                    $('.menuPermissao').removeClass('active')
                    $('.menupermissoes_categoria').removeClass('active')
                    $('.menuDashboard').addClass('active')
                }

                if (window.location.href.indexOf('permissoesCategoria') > -1) {
                    $('.myImoveis').removeClass('active');
                    $('.itensMenu').removeClass('active');
                    $('.proprietario').removeClass('active');
                    $('.espera').removeClass('active');
                    $('.menuImoveis').removeClass('open menu-is-opening menu-open');

                    $('.menuPermissao').removeClass('active')
                    $('.menupermissoes_categoria').removeClass('active')
                    $('.menuDashboard').removeClass('active')
                    $('.menuAcesso').addClass('open menu-is-opening menu-open')
                    $('.permissoesCategoria').addClass('active')
                }




                // Adiciona as classes "menu-open" e "menu-is-opening" ao elemento <li> correspondente ao menu "Imoveis"
                $('li.nav-item.active').parent().addClass('menu-open menu-is-opening');
            });
        </script>

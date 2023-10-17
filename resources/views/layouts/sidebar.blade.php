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
                    <div class="col-7">
                        <i class="fas fa-eye text-white mr-3" onclick="window.open('/', '_blank');" style="cursor: pointer;" data-toggle="tooltip" title="Ver site"></i>

                    </div>
                    
                    <div class="col-4 d-flex justify-content-between nav-treeview cursor-pointer">
       
                        <i class="fas fa-bell text-white mr-3 icones"></i>
                        <i class="fas fa-user text-white mr-3 icones"></i>
                    </div>
                    
                </div>



                <div class="row mb-5 my-5 nav-treeview">
                    <div class="col-12 mb-2">
                        <div class="image d-flex justify-content-center align-items-center">
                            <a href="{{ route('users.edit', ['id' => Auth::user()->id ?? '0']) }}">
                                <img src="" alt="Descrição da imagem" class="img-circle elevation-2 img-fluid scale-down avatar-image" width="80" height="80" alt="User Image">
                            
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

                       @if(Auth::user()->email == config('super.email'))
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link menuDashboard">
                                    <i class=" fas fa-chart-pie custom-icon-alignment"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @endif    
                       
                        <li class="nav-item">
                            <a href="{{ route('profissional.profile',['id' => Auth::user()->id]) }}" class="nav-link menuDashboard">
                                <i class="fas fa-hard-hat"></i>
                                <p>
                                    Perfil Profissional
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('evento.index',['id' => Auth::user()->id]) }}" class="nav-link menuDashboard">
                                <i class="fas fa-hard-hat"></i>
                                <p>
                                    Eventos
                                </p>
                            </a>
                        </li>
                        

                        
                      
                 

                            <li class="nav-item menuImoveis open menu-is-opening menu-open">
                                <a href="{{ route('permissoes_categoria.index') }}" class="nav-link">
                                    <i class=" fas fa-home"></i>
                                    <p>
                                        Imoveis
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('imovel.users', ['user_id' => Auth::user()->id]) }}"
                                            class="nav-link meus_imoveis">
                                            <p class="ml-3">Meus Imoveis</p>
                                        </a>
                                    </li>

                                </ul>

                                @if (Auth::user()->email == config('super.email') )
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('proprietario.index') }}" class="nav-link proprietario">

                                                <p class="ml-3">Proprietários</p>
                                            </a>
                                        </li>

                                    </ul>
                                @endif


                                <ul class="nav nav-treeview">
                                    @if ( Auth::user()->email == config('super.email') )
                                        <li class="nav-item">
                                            <a href="{{ route('imovel.all') }}" class="nav-link imovel_all">

                                                <p class="ml-3">Todos Imoveis</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>

                                <ul class="nav nav-treeview">
                                    @can('ver_imoveis')
                                    <li class="nav-item">
                                        <a href="{{ route('itens.index') }}" class="nav-link itensMenu">

                                            <p class="ml-3">Itens</p>
                                        </a>
                                    </li>
                                    @endcan

                                </ul>

                                <ul class="nav nav-treeview">
                                    @can('ver_imoveis')
                                    <li class="nav-item">
                                        <a href="{{ route('regras.index') }}" class="nav-link itensRegra">

                                            <p class="ml-3">Regras</p>
                                        </a>
                                    </li>
                                    @endcan

                                </ul>

                                @can('ver_imoveis')
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('espera.index') }}" class="nav-link espera">

                                                <p class="ml-3">
                                                    Lista de espera
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                    

                           @can('ver_comercio')     
                          <li class="nav-item comercio open menu-is-opening menu-open">
                             <a href="{{ route('comercio.index') }}" class="nav-link">
                            <i class="fas fa-money-bill-alt"></i>
                                <p>Comercio <i class="right fas fa-angle-left"></i></p>
                            </a>

                            @if(Auth::user()->email == config('super.email'))
                            <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('comercio.index') }}"
                                            class="nav-link allComercio">
                                            <p class="ml-3">Todos os Comercio</p>
                                        </a>
                                    </li>
                                </ul>
                            @endif

                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ route('comercio.index') }}"
                                        class="nav-link allComercio">
                                        <p class="ml-3">Meu Comercio</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                        <li class="nav-item comercio open menu-is-opening menu-open">
                            <a href="{{ route('produtos.index') }}" 
                            class="nav-link">
                            <i class="fas fa-store"></i>
                                <p>
                                    Produtos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            @if(Auth::user()->email == config('super.email'))
                            <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('produtos.index') }}"
                                            class="nav-link allComercio">
                                            <p class="ml-3">Todos os Produtos</p>
                                        </a>
                                    </li>
                                </ul>
                            @endif

                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ route('meus_produtos.index') }}"
                                        class="nav-link allComercio">
                                        <p class="ml-3">Meus Produtos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @if (Auth::user()->email == config('super.email') )
                            <li class="nav-item entregadores open menu-is-opening menu-open">
                            <a href="{{ route('entregadores.index') }}" class="nav-link">
                                <i class="fas fa-bicycle" ></i>
                                <p>
                                    Entregadores
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                       
                          
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ route('entregadores.index') }}"
                                        class="nav-link allEntregadores">
                                        <p class="ml-3">Todos os Entregadores</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif   


                        @if (Auth::user()->email == config('super.email') )
                            <li class="nav-item Cadastro">
                                <a href="" class="nav-link ">

                                    <i class=" fas fa-user-plus"></i>
                                    <p>
                                            Cadastro
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item ">
                                        <a href="{{ route('category.index') }}"
                                            class="nav-link Categoria">

                                            <p class="ml-3">Categoria</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endcan

                        @if (Auth::user()->email == config('super.email'))
                            <li class="nav-item menu_acesso {{ Request::is('*permissaoCategoria*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="" class="nav-link">
                                    <i class=" fas fa-key"></i>
                                    <p>Acesso</p>
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
                                        <a href="{{ route('permissoes.index') }}" class="nav-link permissoesAll">
                                            <p class="ml-3">Permissoes</p>
                                        </a>
                                    </li>

                                </ul>



                               
                                <li class="nav-item menuUser">
                                    <a href="{{ route('users.index') }}" class="nav-link ">
                                        <i class=" fas fa-user-circle"></i>
                                        <p>
                                            Usuário

                                        </p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item ">
                                            <a href="{{ route('users.index') }}" class="nav-link permissoesCategoria">

                                                <p class="ml-3">Listar Usuários</p>
                                            </a>
                                        </li>

                                    </ul>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item ">
                                            <a href="{{ route('depoimento.index') }}"
                                                class="nav-link">

                                                <p class="ml-3">Depoimentos</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                           

                           
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link menuDashboard">
                                        <i class=" fas fa-chart-pie"></i>
                                        <p>
                                            Administrativo
                                        </p>
                                        <i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item ">
                                            <a href="{{ route('log.index') }}" class="nav-link logsMenu">
                                                <p class="ml-3">Logs</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>

        </aside>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

            $('[data-toggle="tooltip"]').tooltip(); 

function updateMenu(routes) {
    const currentUrl = window.location.href;
   
    let matched = false;

    for (const urlPart in routes) {
        if (currentUrl.indexOf(urlPart) > -1) {
            
            routes[urlPart].addClass('active');
            routes[urlPart].addClass('open menu-open menu-is-opening');
            matched = true;
        } else {
            routes[urlPart].removeClass('active');
            routes[urlPart].removeClass('open menu-is-opening menu-open');
        }
    }

    if (!matched) {
        // Caso nenhuma rota seja encontrada, remova a classe 'active' de todos os elementos
        for (const urlPart in routes) {
            routes[urlPart].removeClass('active');
        }
    }
}



      $(document).ready(function() {
            const id_user = {{Auth::user()->id}}
const routes = {
        'imovel/': $('.menuImoveis'),
        'myimoveis':$('.meus_imoveis'),
        'imovel/proprietario': $('.proprietario'),
        'imovel/all':$('.imovel_all'),
        'imovel/itens':$('.imovel_all'),
        'imovel/itens': $('.itensMenu'), 
        'imovel/regras': $('.itensRegra'),  
        'admin/espera':$('.espera'),

        'admin/comercio': $('.allComercio'),
        'admin/comercio': $('.comercio'),
        'admin/entregadores':$('.allEntregadores'),
        'admin/entregadores':$('.entregadores'),
        'categoria': $('.Cadastro'),
        'admin/categoria': $('.Categoria'),
       

        'permissaoCategoria': $('.menu_acesso'),      
        
        'admin/permissoes':$('.permissoesAll'),
        'admin/permissaoCategoria':$('.permissoesCategoria'),
        'permissoes': $('.menu_acesso'),   
      
    };
    updateMenu(routes);



                // Adiciona as classes "menu-open" e "menu-is-opening" ao elemento <li> correspondente ao menu "Imoveis"
                $('li.nav-item.active').parent().addClass('menu-open menu-is-opening');
            });
        </script>
<script>
    $(document).ready(function() {
        var userAvatar = "{{ asset('/uploads/' . Auth::user()->avatar) }}";
        var defaultAvatar = "https://angular-material.fusetheme.com/assets/images/avatars/brian-hughes.jpg";

        // Checar se a imagem do usuário existe
        $('<img/>').attr('src', userAvatar).on('load', function() {
            $(this).remove(); // Evita adicionar imagens extras ao DOM
            $('.avatar-image').attr('src', userAvatar);
        }).on('error', function() {
            $(this).remove(); // Evita adicionar imagens extras ao DOM
            $('.avatar-image').attr('src', defaultAvatar);
        });
    });
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imoveis PPG</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

</head>
<style>
    #navbarToggleExternalContent{
  transform: translateX(-100%);
  transition: transform .35s ease;
  display: block;
  height: 100%;
  min-height: 100%;
}

#navbarToggleExternalContent.menu-show{
  transform: translateX(0%);
}
</style>
<body class="sidebar-mini" style="height: auto;">
  <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                    </a>
              </li>
            
          </ul>

          <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                  <a class="nav-link" href="{{route('logout')}}" >
                      <i class="fas fa-search">Sair</i>
                  </a>
                  <div class="navbar-search-block">
                      <form class="form-inline">
                          <div class="input-group input-group-sm">
                              <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                  aria-label="Search">
                              <div class="input-group-append">
                                  <button class="btn btn-navbar" type="submit">
                                      <i class="fas fa-search"></i>
                                  </button>
                                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                      <i class="fas fa-times"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </li>
          </ul>
      </nav>


      <aside class="main-sidebar sidebar-dark-primary elevation-4">

          <a href="index3.html" class="brand-link">
              <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
              <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

          <div class="sidebar">

              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">@if (Auth::check())
                        Olá, {{ Auth::user()->name }}.
                    @endif</a>
                  </div>
              </div>

              <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                          aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-sidebar">
                              <i class="fas fa-search fa-fw"></i>
                          </button>
                      </div>
                  </div>
                  <div class="sidebar-search-results">
                      <div class="list-group"><a href="#" class="list-group-item">
                              <div class="search-title"><strong class="text-light"></strong>N<strong
                                      class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                      class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                      class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                      class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                      class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                      class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                      class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                      class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                      class="text-light"></strong></div>
                              <div class="search-path"></div>
                          </a></div>
                  </div>
              </div>

              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">

                      <li class="nav-item">
                          <a href="{{route('dashboard')}}" class="nav-link ">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>                          
                      </li>

                      <li class="nav-item">
                        <a href="{{route('imovel.list')}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Busca Imoveis
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>                          
                    </li>


                    @if(Auth::user())
                    <li class="nav-item">
                        <a href="{{route('imovel.users',['user_id' =>Auth::user()->id ])}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Meus Imoveis
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>                          
                    </li>
                    @endif


                    
                  
                    
                  </ul>
              </nav>

          </div>

      </aside>

      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
<body>
    <div class="pos-f-t">
        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
        <div class="bg-dark collapse position-fixed col-2 menu-show" id="navbarToggleExternalContent">
          <!-- https://stackoverflow.com/a/10055302/9265131 -->
          <div class="py-4">
            <h4 class="text-white mx-4">Collapsed</h4>
                <nav id="sidenav" class="sidenav bg-dark">
                    <ul class="nav flex-column text-white">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Produtos</a>
                    </li>
                    </ul>
                </nav>
          </div>
        </div>
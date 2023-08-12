
  @extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-title">Login users</div>
  </div>
  <div class="card-body">
    <form action="{{route('user.auth')}}" method="POST" enctype="multipart/form-data">       
        @csrf
       
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém.</small>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control"  name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="{{route('user.create')}}" class="btn btn-success"> Registrar </a>

        <div class="list-unstyled list-inline social-login">
          <a href="#" class="facebook"> <img src="{{asset('images/fb.png')}}" alt="Classified Plus">Continue wiith Facbook</a>
          <a href="#" class="google"> <img src="{{asset('images/google_p.png')}}" alt="Classified Plus"> <span>Continue with Google</span></a>
          </div>
      </form>
  </div>
</div>
  
@endsection
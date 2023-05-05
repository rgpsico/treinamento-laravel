
  @extends('layouts.app')

@section('content')
<form action="{{route('users.login')}}" method="POST"> 
    @method('POST')
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
      <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu email com ninguém.</small>
    </div>
    <div class="form-group">
      <label for="password">Senha</label>
      <input type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
  
@endsection
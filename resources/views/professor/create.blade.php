@extends('layouts.app')

@section('content')
<div class="row">
<form action="{{route('professor.register')}}" method="POST">
  @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" placeholder="Insira o seu nome">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="tel" class="form-control" id="telefone" placeholder="Insira o seu telefone">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div> 
@endsection
@extends('layouts.app')

@section('content')
<ul class="list-group">
  @for ($x=1; $x<=10; $x++)
    
 
  <li class="list-group-item">
    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y" class="avatar">
    <h4>Nome</h4>
    <p>Descrição</p>
    <div class="rating">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half-alt"></i>
    </div>
  </li>
  @endfor
</ul>

@endsection
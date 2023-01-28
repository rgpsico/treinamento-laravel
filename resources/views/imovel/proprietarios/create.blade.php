@extends('layouts.app')
@section('content')
<div class="container">
  
    @if (session()->has('success'))
        <div class="row">
            <div class=" col-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif


    <form action="{{ isset($model) ? route('proprietario.update', $model->id) : route('proprietario.store') }}" method="post">
        @csrf
        @if(isset($model))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($model) ? $model->name : '' }}">
            @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ isset($model) ? $model->email : '' }}">
            @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($model) ? $model->phone : '' }}">
        
            @if ($errors->has('phone'))
            <div class="text-danger">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">{{ isset($model) ? 'Atualizar' : 'Criar' }}</button>
    </form>
    
</div>
@endsection

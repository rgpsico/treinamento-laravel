@extends('layouts.app')


@section('content')
    </div>
    </div>





    <form action="{{ route('itens.store') }}" method="POST">
        @csrf
        @include('imovel.itens._partials.form')
    </form>

 
@endsection

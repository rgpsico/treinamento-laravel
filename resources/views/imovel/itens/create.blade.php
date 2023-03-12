@extends('layouts.app')


@section('content')
    </div>
    </div>


    <form method="POST"
        @if (isset($model) && $model->id) action="{{ route('itens.update', $model->id) }}"
    @else
        action="{{ route('itens.store') }}" @endif>
        @csrf
        @if (isset($model) && $model->id)
            @method('PUT')
        @endif
        @include('imovel.itens._partials.form')
    </form>
@endsection

@extends('layouts.app')


@section('content')
    </div>
    </div>


    <form method="POST"
        @if (isset($model) && $model->id) action="{{ route($route.'.update', $model->id) }}"
    @else
        action="{{ route($route.'.store') }}" @endif>
        @csrf
        @if (isset($model) && $model->id)
            @method('PUT')
        @endif
        @include($view.'._partials.form')
    </form>
@endsection

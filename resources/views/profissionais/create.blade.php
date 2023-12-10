@extends('layouts.app')


@section('content')
    </div>
    </div>


    <form method="POST" enctype="multipart/form-data"
        @if (isset($model) && isset($model->id)) 
            action="{{ route($route.'.update', $model->id) }}"
            @csrf
        @else
            action="{{ route($route.'.store') }}"> @endif
            @csrf
        @if (isset($model) && isset($model->id))
            @method('PUT')
        @endif
        @include($partials.'._partials.form')
        
    </form>
@endsection

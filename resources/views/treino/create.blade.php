@extends('layouts.app')


@section('content')

</div>
</div>

<div class="row">
    @if (session()->has('success'))
<div class="row">
    <div class=" col-12 alert alert-success">
        {{ session()->get('success') }}
    </div>
</div>
@endif
</div>

<div class="row">
<form action="{{route('category.store')}}" method="POST">
    @csrf
    @include('category._partials.form')
</form>
</div>
@endsection

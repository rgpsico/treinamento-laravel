@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="row">
            <div class=" col-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Adicionar Casa</h3>
            </div>


            <form action="{{ route('imovel.store') }}" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                @include('imovel._partials.form')
        
        </div>

    <!-- Javascript Requirements -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\ImoveisRequest', '#myForm') !!}
@endsection

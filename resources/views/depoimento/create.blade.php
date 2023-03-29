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

        <div class="card card-primary p-5">
            <div class="card-header">
                <h3 class="card-title">Depoimento</h3>
            </div>
            <div class="card-body">

                @include('depoimento._partials.form')

            </div>
        </div>
    @endsection

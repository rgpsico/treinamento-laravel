@extends('layouts.app')


@section('content')
    <style>
        body {
            font-size: 12px;
        }

        .card .card-title {
            color: #D8D9E3;
            margin-bottom: 1.5rem;
            text-transform: capitalize;
            font-size: 1.125rem;
            font-weight: 600;
        }

        .fa-plus {
            color: #D8D9E3;
        }
    </style>

@section('content')
    <div class="container">
        <x-alert />
    </div>

    <div class="col-6 mb-2 d-flex justify-content-start align-items-start">
        <h1 class="text-dark font-weight-bold">{{ $pageTitle }}</h1>
    </div>
    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
        <a href="{{ route('produtos.create') }}" class="btn btn-success">
            <i class="fas fa-home"></i>
            <span>Adicionar {{ $pageTitle }}</span></a>
    </div>

   @include('produtos._partials.filtros')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">{{ $pageTitle }} <span
                        class="text-dark small">{{ count($model) }}</span></h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                <tr>
                                    <td>
                                        {{ $value->id }}
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('produtos.edit', ['id' => $value->id]) }}"
                                            class=" mr-2 btn btn-info" style="height:40px; padding:10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('produtos.destroy', ['id' => $value->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mr-2" type="submit"
                                                style="height:40px; padding:10px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

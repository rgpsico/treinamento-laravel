@extends('layouts.app')


@section('content')
    

@section('content')



<x-datatables_resources/>
@include('produtos._partials.filtros')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">{{ $pageTitle }} </h4>
                <p class="card-description"></p>
                <div class="table-responsive">
                    <table class="table table-striped" id="produtos">
                        <thead>
                            <tr>
                                <th>#</th>
                                 <th>image</th>
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
                                    <td>
                                    @if (isset($value->images[0]) && !is_null($value->images[0]))
                                        <img src="{{ asset($value->images[0]->image_path) }}" width="80" height="50">
                                    @endif
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

    <script>
        $(document).ready(function() {
            var table = $('#produtos').DataTable();
    
            // Filtro Comércio
            $("select[name='filtroComercio']").on('change', function() {
                table.column(2).search($(this).val()).draw();
            });
    
            // Filtro Preço
            $("select[name='filtroPreco']").on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>
    
@endsection

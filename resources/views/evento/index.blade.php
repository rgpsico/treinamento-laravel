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


    <div class="col-6 mb-2 d-flex justify-content-start align-items-start">
        <h1 class="text-dark font-weight-bold">{{ $pageTitle }}</h1>
    </div>
    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
        <a href="{{ route($route.'.create') }}" class="btn btn-success">
            <i class="fas fa-home"></i>
            <span>Adicionar {{ $pageTitle }}</span></a>
    </div>

    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
       
            <i class="fas fa-home"></i>
            <span>Adicionar <button class="btn btn-info teste">TESTE</button></span>
    </div>

    <div class="container">
        <div class="row">
            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">KitNets</option>
                    <option value="Selecione">Casas</option>
                    <option value="Selecione">Loja</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Status</option>
                    <option value="Selecione">Alugado</option>
                    <option value="Selecione">Vago</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Proprietario</option>
                    <option value="Selecione">ROger</option>
                    <option value="Selecione">Fabiane</option>
                </select>
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Preço</option>
                    <option value="Selecione">400</option>
                    <option value="Selecione">500</option>
                </select>
            </div>
        </div>
    </div>

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
                                <th>Titulo</th>
                                <th>Data do Evento</th>
                                <th>Status</th>
                                <th>Capacidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->titulo ?? '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($value->data_evento)->format('d/m/Y') }}</td> <!-- Formatação da data -->
                                    <td>
                                        <select name="" id="status_evento" data-id='{{ $value->id }}' class="form-control">
                                            <option value="1"{{ $value->status == 1 ? 'selected' : '' }}>Ativo</option>
                                            <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>Inativo</option>
                                        </select>
                                    </td>
                                    <td>{{ $value->capacidade ?? '' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route($route.'.edit', ['id' => $value->id ?? '']) }}" class=" mr-2 btn btn-info" style="height:40px; padding:10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route($route.'.destroy', ['id' => $value->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mr-2" type="submit" style="height:40px; padding:10px;">
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


$(document).on('click', '.teste', function(e) {
     

            $.ajax({
                type: 'GET',
                url: 'http://localhost:5000/my',
             
                success: function(data) {
                    console.log(data.content);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
});
         $(document).on('change', '#status_evento', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = '/api/evento/' + id + '/updatestatus';

            $.ajax({
                type: 'PUT',
                url: url,
                data: {
                    status: $(this).val()
                },
                success: function(data) {
                    console.log(data.content);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    
    </script>
@endsection

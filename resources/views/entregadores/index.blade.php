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

    <div class="container">
        <div class="row">
            <x-select :options="config('options.select_profissionais')" name="tipo" label="Tipo de Profisional" selected="tipo" col='12' :data="$model ?? ''" />
        

            <div class="form-group col-12 col-md-2">
                <select name="status" id="status" class="form-control">
                    <option value="">Selecione</option>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
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
                                <th>Logo</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Status</th>
                                <th>Endereço</th>
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
                                        <img src="{{ asset('imagens/entregadores/' . $value->avatar) }}"
                                            width="100" height="80" class="card-img">
                                   </td>
                                    <td>{{ $value->name }}</td>
                                    <td><a   title="Enviar mensagem via WhatsApp" href="{{ whatsappUrlFromPhone($value->phone) }}">{{$value->phone}}</a></td>
                                    <td>
                                    <select name="" id="status_entregadores" data-id='{{ $value->id }}'class="form-control">
                                            <option value="1"{{ $value->status == 1 ? 'selected' : '' }}>Ativo</option>
                                            <option value="0" {{ $value->status == 0 ? 'selected' : '' }}>inativo</option>
                                    </select>
                                    </td>
                                    <td>{{ $value->endereco }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route($route.'.edit', ['id' => $value->id ?? '']) }}" class=" mr-2 btn btn-info"
                                            style="height:40px; padding:10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route($route.'.destroy', ['id' => $value->id]) }}" method="POST">
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
          $(document).on('change', '#status_entregadores', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = '/api/entregadores/' + id + '/updatestatus';

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

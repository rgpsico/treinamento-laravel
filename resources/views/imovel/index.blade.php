@extends('layouts.app')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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

        .livre {
            color: green;
        }

        .alugado {
            color: red;
        }

        .table {
            font-size: 12px;
        }
    </style>

@section('content')

<x-datatables_resources/>

    <div class="container">
        <x-alert/>
    </div>

    @include('imovel._partials.header')
   @include('imovel._partials.filtros')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">


            <div class="card-body">

                <div class="row">
                    <h4 class="card-title text-dark">Imoveis
                        <span class="text-dark small">{{ count($data) }}</span>
                    </h4>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label for="acao_imoveiss">Ação</label>
                        <select name="acao_imoveiss" id="" class="form-control">
                            <option value="update">Atualizar</option>
                            <option value="excluir">Excluir</option>
                        </select>
                    </div>

                    <div class="form-group col-2">
                        <form action="">
                            <button id="acao_imoveis" class="btn btn-success my-4">Enviar</button>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped" id="imovelLista">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="" id="marcarTodos"></th>
                                <th>Imagem</th>
                                <th>Título</th>
                                <th>Preço</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Status Admin</th>
                                <th>Data de criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="imoveis_body">
                            @foreach ($data as $value)
                                <tr>
                                    <td><input type="checkbox" data-id="{{ $value->id }}" name="checkboxImovel"
                                            id="checkboxImovel"></td>
                                    <td>
                                        @if (isset($value->gallery[0]) && !is_null($value->gallery[0]))
                                            <img src="{{ asset('imagens/imoveis/' . $value->gallery[0]->image) }}"
                                                width="30" height="50" class="card-img">
                                        @endif
                                    </td>
                                    <td>{{ $value->title ?? '' }}</td>
                                    <td>R${{ $value->price ?? '' }}</td>
                                    <td>{{ $value->type == 1 ? 'Casa' : 'KitNet' }}</td>

                                    <td class='{{ $value->status == 1 ? 'red' : 'gren' }}'>
                                        {{ $value->status == 1 ? 'Alugado' : 'Livre' }}</td>

                                    <td class='{{ $value->status_admin == 1 ? 'red' : 'green' }}'>
                                        <select name="status_admin" data-id='{{ $value->id }}' id="status_admin"
                                            class="form-control">
                                            @foreach (['ativo', 'inativo'] as $key => $status)
                                                <option value="{{ $key }}"
                                                    {{ $key == $value->status_admin ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>


                                    <td>{{ date('d/m/Y', strtotime($value->created_at)) }}
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('imovel.show', ['id' => $value->id]) }}"
                                            class=" mr-2 btn btn-dark" style="height:40px; padding:10px;">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('imovel.edit', ['id' => $value->id]) }}"
                                            class=" mr-2 btn btn-info" style="height:40px; padding:10px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('imovel.destroy', ['id' => $value->id]) }}" method="POST">
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

function row(data) {
    var created_at = moment(data.created_at).format('DD/MM/YYYY');

    return `
        <tr>
            <td><input type="checkbox" name="ids[]" value="${data.id}" class="checkbox-item"></td>
            <td><img src="http://127.0.0.1:8000/imagens/imoveis/${data.gallery[0].image}" width="50"></td>
            <td>${data.title}</td>
            <td>${data.price}</td>
            <td>${data.type}</td>
            <td>${data.status}</td>
            <td>${data.status_admin}</td>
            <td>${created_at}</td>
            <td>
                <a href="/${data.id}/edit" class="btn btn-primary btn-sm">Editar</a>
                <a href="/${data.id}/show" class="btn btn-info btn-sm">Ver</a>
                <a href="/${data.id}/destroy" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
    `;
}


   

 
    $('.filtro').change(function() {

    var tipo = $(this).val();
   
   
    $.ajax({
        url: '/api/imovel/search',
        type: 'GET',
        data: {
            tipo: tipo,
            status:$('#status').val(),
            proprietario:$('#proprietario').val()
        
        },
        success: function(response) {
            var imoveisBody = $('#imoveis_body');
            imoveisBody.empty();
            $.each(response.imoveis, function(index, imovel) {
                var rowHtml = row(imovel);
                imoveisBody.append(rowHtml);
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
});

      
        $('#acao_imoveis').click(function(e) {
            e.preventDefault()
            var ids = [];
            $('input[name="checkboxImovel"]:checked').each(function() {
                ids.push($(this).data('id'));
            });
            if (ids.length === 0) {
                alert('Nenhum item selecionado');
                return;
            }
            if (confirm('Tem certeza que deseja excluir os itens selecionados?')) {
                $.ajax({
                    url: '{{ route('delete-selected') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: ids
                    },
                    success: function(response) {
                        alert('Itens excluídos com sucesso');
                        location.reload();
                    },
                    error: function() {
                        alert('Ocorreu um erro ao excluir os itens');
                    }
                });
            }
        });


        $(document).on('change', '#status_admin', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var url = '/api/imovel/' + id + '/update';

            $.ajax({
                type: 'PUT',
                url: url,
                data: {
                    status_admin: $(this).val()
                },
                success: function(data) {
                    console.log(data.content);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
        // Selecione o checkbox com o id "marcarTodos"
        const marcarTodos = document.querySelector('#marcarTodos');

        // Selecione todos os checkboxes dentro da tabela com o id "tableLisst"
        const checkboxes = document.querySelectorAll('#imovelLista input[type="checkbox"]');

        // Adicione um listener de evento no checkbox "marcarTodos"
        marcarTodos.addEventListener('click', function() {
            // Verifique se o checkbox "marcarTodos" está marcado ou não
            const isChecked = marcarTodos.checked;

            // Percorra todos os checkboxes dentro da tabela "tableLisst" e marque/desmarque cada um deles
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });
        });
    </script>
@endsection

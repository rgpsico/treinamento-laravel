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
        @if (session()->has('success'))
            <div class="row">
                <div class=" col-12 alert alert-success">
                    {!! html_entity_decode(session('success')) !!}
                </div>
            </div>
        @endif
    </div>

    <div class="modal fade" id="editProfissaoModal" tabindex="-1" role="dialog" aria-labelledby="editProfissaoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProfissaoModalLabel">Editar Profissão</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Formulário de edição -->
              <form id="editProfissaoForm">
                <!-- Campos do formulário, como nome da profissão, etc. -->
                <input type="hidden" id="profissaoId" name="id">
                <div class="form-group">
                  <label for="nomeProfissao">Nome da Profissão</label>
                  <input type="text" class="form-control" id="nomeProfissao">
                </div>
               
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary operationType" id="saveChanges">Salvar mudanças</button>
            </div>
          </div>
        </div>
      </div>
      

    <div class="col-6 mb-2 d-flex justify-content-start align-items-start">
        <h1 class="text-dark font-weight-bold">{{ $pageTitle }}</h1>
    </div>
    
    <div class="col-6 mb-2 d-flex justify-content-end align-items-end">
        <a  id="addNewProfissao" class="btn btn-success">
            <i class="fas fa-home"></i>
            <span>Adicionar Profisão</span></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="form-group col-12 col-md-2">
                <input type="text" class="form-control" placeholder="Nome da Profissão">
            </div>

            <div class="form-group col-12 col-md-2">
                <select name="" id="" class="form-control">
                    <option value="Selecione">Status</option>
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

                                <th>id</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $value)
                            <tr id="profissaoRow-{{ $value->id }}">
                                    <td><input type="checkbox"></td>

                                    <td>{{ $value->id}}</td>
                                    <td>{{ $value->nome}}</td>

                                    <td class="d-flex">

                                        <a href="#" class="editBtn btn btn-info mr-2" style="height:40px; padding:10px;" data-id="{{ $value->id }}" data-nome="{{ $value->nome }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    
                                       
                                            <button class="btn btn-danger mr-2" type="button" onclick="confirmDelete({{ $value->id}})" style="height:40px; padding:10px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                    
                                    
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
   function confirmDelete(profissaoId) {
    if (confirm('Tem certeza que deseja excluir esta profissão?')) {
        $.ajax({
            url: '/api/profissao/' + profissaoId, // URL da rota de exclusão
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
                $('#profissaoRow-' + profissaoId).remove(); // Remove a linha da tabela
                // Exiba uma mensagem de sucesso, se desejar
            },
            error: function(xhr, status, error) {
                // Trate erros aqui
            }
        });
    }
}


    $(document).ready(function() {

      $('#addNewProfissao').on('click', function() {
         $('.modal-title').text("Adicionar Profissão");
        $('#editProfissaoForm')[0].reset(); // Limpa o formulário
        $('#profissaoId').val('');
        $('#operationType').val('add');
       
        

        $(".operationType").text("Criar Profissão")
        $('#editProfissaoModal').modal('show');
    });

    $('.editBtn').on('click', function(e) {
        e.preventDefault();
        
        // Obter os dados da linha
        var id = $(this).data('id');
        var nome = $(this).data('nome');

        // Preencher o formulário no modal
        $('#profissaoId').val(id);
        $('#nomeProfissao').val(nome);

        
        $('#editProfissaoModal').modal('show');
    });


   
    $('#saveChanges').on('click', function(e) {
    e.preventDefault();

    var id = $('#profissaoId').val();
    var nome = $('#nomeProfissao').val();

    $.ajax({
        url: '/api/profissao/' + id, // URL para a rota de atualização
        type: 'PUT', // Método HTTP
        data: {
            nome: nome,
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
   
        },
        success: function(response) {
            // Trate a resposta bem-sucedida aqui
            $('#profissaoRow-' + id).find('td:nth-child(3)').text(nome);
            $('#editProfissaoModal').modal('hide');
            
        },
        error: function(xhr, status, error) {
            // Trate erros aqui
        }
    });
});


});

</script>

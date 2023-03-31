@extends('layouts.app')

@section('content')
    <style>
        body {
            background: rgb(99, 39, 120)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>

    <div class="container rounded bg-white ">
        <x-alert />
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if (isset($data->avatar))
                        <img src="{{ asset('/uploads/' . $data->avatar) }}" width="100px" height="100px"
                            alt="Descrição da imagem">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU"
                            alt="Descrição da imagem">
                    @endif

                    <span class="font-weight-bold">{{ $data->name }}</span>
                    <span class="text-black-50">{{ $data->email }}</span><span>
                    </span>
                </div>
                <form id="form-imagem" method="POST" enctype="multipart/form-data">
                    <input type="file" style="width: 150px;" name="imagem" id="input-imagem">
                    <br>
                    <button type="submit" class="btn btn-success my-3">Enviar</button>
                </form>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Editar Usúario</h4>
                    </div>
                    <div class="row mt-2">
                        <form action="{{ route('users.update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label class="labels">Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" name="name"
                                    value="{{ $data->name }}">
                            </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Telefone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Seu telefone"
                                value="{{ $data->phone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Cep</label>
                            <input type="text" class="form-control" name="cep" placeholder="Digite seu Cep"
                                value="{{ $data->endereco->cep ?? '' }}">
                        </div>

                        <div class="col-md-12">
                            <label class="labels">Rua</label>
                            <input type="text" class="form-control" name="rua" placeholder="Rua "
                                value="{{ $data->endereco->rua ?? '' }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email </label>
                            <input type="text" class="form-control" name="email" placeholder="Seu email "
                                value="{{ $data->email }}">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Cidade</label>
                            <input type="text" class="form-control" name="cidade" placeholder="cidade"
                                value="{{ $data->endereco->cidade ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Estado</label>
                            <input type="text" class="form-control" name="estado"
                                value="{{ $data->endereco->estado ?? '' }}" placeholder="state">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Salvar</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <span>Editar Permissões</span>
                    </div>
                    <br>
                    <form action="{{ route('users.addPermissao') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $data->id }}">
                        @foreach ($categorias as $categoria)
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        {{ $categoria->name }}
                                    </div>
                                </div>
                                <div class="card-body">

                                    @foreach ($permissoes->where('categoria_id', $categoria->id) as $permissao)
                                        <div class="col-md-12">
                                            <p class="medium">
                                                <input type="checkbox" name="permission_id[]" value="{{ $permissao->id }}"
                                                    @if ($data->permissoesUser->pluck('permission_id')->contains($permissao->id)) checked @endif />
                                                {{ $permissao->name }}
                                            </p>
                                        </div>
                                    @endforeach
                                    @if ($permissoes->where('categoria_id', $categoria->id)->isEmpty())
                                        <div class="col-md-12">
                                            <p class="medium">Nenhuma permissão encontrada.</p>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                        <div class="col-12 d-flex justify-content-end ">
                            <button class="btn btn-success">Salvar Permissões</button>
                        </div>

                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        $(document).on('click', '#minha-imagem', function() {
            $('#input-imagem').trigger('click');
        });

        $('#form-imagem').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}'); // adiciona o token CSRF ao FormData
            formData.append('id', '{{ $data->id }}');
            $.ajax({
                url: '/api/upload-imagem',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }, // adiciona o cabeçalho X-CSRF-Token à solicitação AJAX
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection

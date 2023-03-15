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
                    <img class="rounded-circle mt-5"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU"><span
                        class="font-weight-bold">{{ $data->name }}</span>
                    <span class="text-black-50">{{ $data->email }}</span><span>
                    </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Telefone</label>
                            <input type="text" class="form-control" placeholder="Seu telefone"
                                value="{{ $data->phone }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Endereço</label>
                            <input type="text" class="form-control" placeholder="enter address" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email </label>
                            <input type="text" class="form-control" placeholder="enter email id" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Education</label>
                            <input type="text" class="form-control" placeholder="education" value="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label>
                            <input type="text" class="form-control" placeholder="country" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State/Region</label>
                            <input type="text" class="form-control" value="" placeholder="state">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Salvar</button>
                    </div>
                </div>
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
                            <button class="btn btn-success">Salvar</button>
                        </div>

                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

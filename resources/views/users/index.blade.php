@extends('layouts.app')

@section('content')
    <div class="col-2 mb-2">
        <button class="btn btn-success">Criar Novo Usuário</button>
    </div>
    <div class="card container">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Ações</th>
            </thead>
            <tbody>

                @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td> <span class="text-danger bg-success cursor-pointer"
                                id="profile">{{ $value->UserProfile[0]->profile->name }}</span>
                        </td>
                        <td>
                            <button class="btn btn-info">Editar</button>
                            <button class="btn btn-danger">Excluir</button>
                        </td>
                    <tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection

@extends('layouts.app')


@section('content')
    </div>

    <h1>Nome profile: {{ $data->name }}</h1>

    <ul>

    </ul>


    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3 card">
                <div class="card-header">
                    <div class="cart-title">
                        Permissões
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Nome</th>
                        </thead>
                        <tbody>

                            <form action="{{ route('profile.addProfileAndPermissao') }}" method="POST">
                                <input type="hidden" name="profile_id" value="{{ $data->id }}">
                                @csrf
                                @foreach ($permissoes as $permissao)
                                    <tr>
                                        <td> <input type="checkbox" name='permissao_id[]' value="{{ $permissao->id }}"></td>
                                        <td> {{ $permissao->name }}</td>
                                    </tr>
                                @endforeach

                        </tbody>
                    </table>


                    <div class="divider"></div>

                    <div class="card-footer">
                        <button class="btn btn-success"> Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection

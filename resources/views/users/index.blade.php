@extends('layouts.app')

@section('content')
    @include('users._partials.modal')
    <div class="col-2 mb-2">
        <button class="btn btn-success">Criar Novo Usuário</button>
    </div>
    <div class="card container">
        <table class="table" id="ususario_table">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Perfil</th>
                <th>Ações</th>
            </thead>
            <tbody>



            </tbody>

        </table>
    </div>
@endsection
<script src='{{ asset('js/app.js') }}'></script>
<script src='{{ asset('js/teste.js') }}'></script>
<script>
    $(document).on("click", "#profile", function() {
        $('#userProfile').modal('show')

    });
</script>

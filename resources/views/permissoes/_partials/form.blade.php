@section('content')
    @if (session()->has('success'))
        <div class="row">
            <div class=" col-12 alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
<div class="col-md-12 col-12">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Criar Permissoes</h3>
        </div>


        <form action="{{ isset($data) == null ? route('permissoes.store') :  route('permissoes.update',['id' => $data->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Admin" value="{{$data->name ?? ''}}">
                </div>
              
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{isset($data) == null ? 'Cadastrar' : 'Salvar' }}</button>
            </div>
        </form>
    </div>



</div>
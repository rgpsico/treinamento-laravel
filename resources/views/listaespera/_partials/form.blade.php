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
            <h3 class="card-title">Cadastrar Na lista de espera</h3>
        </div>


        <form action="{{ isset($model) == null ? route('espera.store') :  route('espera.update', ['id' => $model->id])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Admin" value="{{$model->name ?? ''}}">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Descrição</label>
                    <input type="text" class="form-control" id="description" name='description' placeholder="Admin" value="{{$model->description ?? ''}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Lugar</label>
                    <input type="text" class="form-control" id="place" name='place' placeholder="Admin" value="{{$model->place ?? ''}}">
                </div>
              
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{isset($model) == null ? 'Cadastrar' : 'Salvar' }}</button>
            </div>
        </form>
    </div>



</div>
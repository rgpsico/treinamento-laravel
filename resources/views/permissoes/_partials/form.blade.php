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


            <form
                action="{{ isset($data) == null ? route('permissoes.store') : route('permissoes.update', ['id' => $data->id]) }}"
                method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Label</label>
                        <input type="text" class="form-control" id="label" name='label'
                            placeholder="Ex: Ver usúario" value="{{ $data->label ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" id="name" name='name'
                            placeholder="Ex: ver_usuario" value="{{ $data->name ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            @foreach ($categoria->unique('id') as $value)
                                @if (isset($data->categoria_id) && $data->categoria_id == $value->id)
                                    <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit"
                        class="btn btn-primary">{{ isset($data) == null ? 'Cadastrar' : 'Salvar' }}</button>
                </div>
            </form>
        </div>



    </div>

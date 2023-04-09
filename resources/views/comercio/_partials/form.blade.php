<style>
    .form-label {
        display: inline-block;
        margin-bottom: 0.1rem;
        font-weight: 600;
    }
</style>

<div class="container">
    <div class="card card-primary">

        @if (session()->has('success'))
            <div class="row">
                <div class=" col-12 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">Adicionar {{$pageTitle}}</h3>
        </div>

        <input  type="text" id="id" name="id"
        class="form-control" value="{{ $model->id }}">
        <div class="col-12 my-5">
            <div class="form-group">
                <label for="title" class="form-label">Nome do Comércio:</label>
                <input placeholder="Nome do comércio" type="text" id="nome" name="nome"
                    class="form-control" value="{{ $model->nome ?? '' }}">
                @if ($errors->has('nome'))
                    <div class="text-danger">{{ $errors->first('nome') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Telefone:</label>
                <input placeholder="Telefone do comércio" type="text" id="telefone" name="telefone"
                    class="form-control" value="{{ $model->telefone ?? '' }}">
                @if ($errors->has('telefone'))
                    <div class="text-danger">{{ $errors->first('telefone') }}</div>
                @endif
            </div>

            <input  type="hidden" id="status" name="status"
            class="form-control" value="0">

            <div class="form-group">
                <label for="title" class="form-label">Endereço:</label>
                <input placeholder="Endereço Pistão " type="text" id="endereco" name="endereco"
                    class="form-control" value="{{ $model->endereco ?? '' }}">
                @if ($errors->has('endereco'))
                    <div class="text-danger">{{ $errors->first('endereco') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Logo:</label>
                <input type="file" id="logo" name="logo"
                    class="form-control" value="{{ $model->Logo ?? '' }}">
                @if ($errors->has('logo'))
                    <div class="text-danger">{{ $errors->first('logo') }}</div>
                @endif
            </div>
        </div>





        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($model) ? 'Atualizar' : 'Cadastrar' }}</button>
        </div>
    </div>

</div>
<div class="card m-5">
    <div class="card-body">
        <h5 class="card-title">{{$pageTitle}} </h5>
        <p class="card-text">
            Você pode dizer quais {{$pageTitle}} Loja material de consstrução , padaria , cantina etc.
        </p>

    </div>
</div>
</div>
</form>
</div>

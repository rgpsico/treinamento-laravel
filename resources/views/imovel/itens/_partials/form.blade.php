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
            <h3 class="card-title">Adicionar Itens</h3>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="title" class="form-label">Nome:</label>
                <input placeholder="Ex:Armário, sofa , cama , geladeira" type="text" id="name" name="name"
                    class="form-control" value="{{ $model->name ?? '' }}">
                @if ($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Descrição:</label>
                <input placeholder="Ex:Armário, sofa , cama , geladeira" type="text" id="descricao" name="descricao"
                    class="form-control" value="{{ $model->descricao ?? '' }}">

                @if ($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('descricao') }}</div>
                @endif
            </div>

        </div>





        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $model ? 'Atualizar' : 'Cadastrar' }}</button>
        </div>
    </div>

</div>
<div class="card m-5">
    <div class="card-body">
        <h5 class="card-title">Itens </h5>
        <p class="card-text">
            Você pode dizer quais itens tem na sua kitnet/casa por exemplo: armário, bujão de gás etc.
        </p>

    </div>
</div>
</div>
</form>
</div>

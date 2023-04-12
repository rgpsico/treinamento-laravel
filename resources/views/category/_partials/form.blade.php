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

        <input  type="hidden" id="id" name="id"
        class="form-control" value="{{ $model->id ?? '' }}">
        <div class="col-12 my-5">
            <div class="form-group">
                <label for="title" class="form-label">Nome Categoria:</label>
                <input placeholder="Nome do comércio" type="text" id="name" name="name"
                    class="form-control" value="{{ $model->name ?? '' }}">
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Descrição:</label>
                <input placeholder="Categoria" type="text" id="description" name="description"
                    class="form-control" value="{{ $model->description ?? '' }}">
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>

            

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($model->id) ? 'Atualizar' : 'Cadastrar' }}</button>
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

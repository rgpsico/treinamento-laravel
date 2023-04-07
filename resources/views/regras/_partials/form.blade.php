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

        <div class="col-12">
            <div class="form-group">
                <label for="title" class="form-label">Descrição:</label>
                <input placeholder="Proibido animais, Proibido fumar etc" type="text" id="descricao" name="descricao"
                    class="form-control" value="{{ $model->descricao ?? '' }}">
                @if ($errors->has('descricao'))
                    <div class="text-danger">{{ $errors->first('descricao') }}</div>
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
            Você pode dizer quais {{$pageTitle}} tem na sua kitnet/casa por exemplo: armário, bujão de gás etc.
        </p>

    </div>
</div>
</div>
</form>
</div>

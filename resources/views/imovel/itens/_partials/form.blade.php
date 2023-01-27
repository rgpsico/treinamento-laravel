<style>
    .form-label {
        display: inline-block;
        margin-bottom: 0.1rem;
        font-weight: 600;
    }
</style>
<div class="container-fluid">
<div class="card-body">

    <div class="col-12">
        <div class="form-group">
            <label for="title" class="form-label">Nome:</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="name" name="name"
                class="form-control" value="{{ $model->name ?? '' }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição:</label>
            <input placeholder="Arcondicionado split" type="text" id="descricao" name="descricao"
                class="form-control" value="{{ $model->descricao ?? '' }}">
            @if ($errors->has('descricao'))
                <div class="text-danger">{{ $errors->first('email_desc') }}</div>
            @endif
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
</div>
    </form>

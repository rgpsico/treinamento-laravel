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
            <label for="name" class="form-label">Nome:</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="name" name="name"
                class="form-control" value="{{ $model->name ?? '' }}">
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição:</label>
            <input placeholder="Arcondicionado split" type="text" id="description" name="description"
                class="form-control" value="{{ $model->description ?? '' }}">
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="link" class="form-label">Descrição:</label>
            <input placeholder="Arcondicionado split" type="text" id="link" name="link"
                class="form-control" value="{{ $model->link ?? '' }}">
            @if ($errors->has('link'))
                <div class="text-danger">{{ $errors->first('link') }}</div>
            @endif
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>
</div>
    </form>

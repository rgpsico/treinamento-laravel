<div class="card-body">


    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="form-group">
        <label for="exampleInputEmail1">Tipo</label>
        @if(isset($data) && !is_null($data))
        <select name="type" id="type" name="type" class="form-control">
            <option value="0" {{ $data->type == 0 ? 'selected' : '' }} class="form-control">Casa</option>
            <option value="1" {{ $data->type == 1 ? 'selected' : '' }} class="form-control">KitNet</option>
        </select>
    @else
        <select name="type" id="type" name="type" class="form-control">
            <option value="0" class="form-control">Casa</option>
            <option value="1" class="form-control">KitNet</option>
        </select>
    @endif
    </div>

    <div class="form-group">
        <label for="andress">Titulo do Anuncio</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $data->title ?? '' }}">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Endereço</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $data->address ?? '' }}">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1">Valor</label>
        <input type="text" class="form-control" name="price" id="price" value="{{ $data->price ?? '' }}">
    </div>
    <div class="form-group">
        <input type="file" name="avatar[]" multiple id="avatar">
    </div>
    @if(isset($data) && !is_null($data))
    <div class="input-group-append">
        <img src="{{ asset('imagens/imoveis/' . $data->avatar) }}" height="200px" width="200px" />
    </div>
    @else 
    <div class="input-group-append">
        <img src="" height="200px" width="200px" />
    </div>
    @endif
</div>
</div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>

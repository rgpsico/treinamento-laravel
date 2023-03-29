<style>
    .form-label {
        display: inline-block;
        margin-bottom: 0.1rem;
        font-weight: 600;
    }
</style>
<div class="card-body">


    <input type="hidden" name="user_id" value="{{ Auth::id() }}">





    <div class="col-12">
        <div class="form-group">
            <label for="type" class="form-label">Tipo</label>
            @if (isset($data) && !is_null($data))
                <select name="type" id="type" name="type" class="form-control">
                    <option value="0" {{ $data->type == 0 ? 'selected' : '' }} class="form-control">Casa</option>
                    <option value="1" {{ $data->type == 1 ? 'selected' : '' }} class="form-control">KitNet</option>
                </select>
            @else
                <select name="type" id="type" name="type" class="form-control">
                    <option value="1" class="form-control">Casa</option>
                    <option value="2" class="form-control">Kitnet</option>
                </select>
            @endif

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="" selected>Selecione</option>
                @if (isset($data) && !is_null($data))
                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }} class="form-control">Livre
                    </option>
                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }} class="form-control">Alugado
                    </option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="title" class="form-label">Titulo:</label>
            <input placeholder="Ex: Casa na Nova Brasilia" type="text" id="title" name="title"
                class="form-control" value="{{ $data->title ?? '' }}">
            @if ($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
            @endif
        </div>
    </div>


    <div class="col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descrição:</label>
            <input placeholder="Ex: Casa Com cozinha pequena e um Quarto " type="text" id="description"
                name="description" class="form-control" value="{{ $data->description ?? '' }}">
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('email_desc') }}</div>
            @endif
        </div>
    </div>



    <div class="col-12">
        <div class="form-group">
            <label for="address" class="form-label">Lugar da comunidade:</label>
            <input placeholder="Ex: Rampinha, Pistão, Terreirão " type="text" id="address" name="address"
                class="form-control" value="{{ $data->address ?? '' }}">
            @if ($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
            @endif
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="price" class="form-label">Preço:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" max="10000"
                class="form-control" value="{{ $data->price ?? '' }}">
            @if ($errors->has('price'))
                <div class="text-danger">{{ $errors->first('price') }}</div>
            @endif
        </div>
    </div>


    @if (count($itens) > 0)
        <div class="col-12">
            <div class="form-group">
                <label for="item" class="form-label">Itens:</label>
                <br>
                <div class="row">

                    @foreach ($itens as $item)
                        <label for="item" class="ml-4 m-2" name="item">{{ $item->name }}</label>
                        <input type="checkbox" class="" name="itens[]" value="{{ $item->id }}">
                    @endforeach

                </div>

            </div>
        </div>
    @endif


    <div class="form-group">
        <label class="label"> Fotos do imovel </label>
        <br>
        <input type="file" name="avatar[]" multiple id="avatar" class="forn-control">
        @if ($errors->has('avatar'))
            <div class="text-danger">{{ $errors->first('avatar') }}</div>
        @endif
    </div>

</div>
</div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>

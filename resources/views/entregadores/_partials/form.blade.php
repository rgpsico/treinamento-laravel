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

        <input type="hidden" id="id" name="id" class="form-control" value="{{ $model->id ?? '' }}"/>
        <div class="col-12 my-5">
            <div class="form-group">
                <label for="title" class="form-label">Nome do Entregador:</label>
                <input placeholder="Nome do {{$pageTitle}}" type="text" id="name" name="name"
                    class="form-control" value="{{ $model->name ?? '' }}">
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Telefone:</label>
                <input placeholder="Telefone do entregadores" type="text" id="phone" name="phone"
                    class="form-control" value="{{ $model->phone ?? '' }}">
                @if ($errors->has('phone'))
                    <div class="text-danger">{{ $errors->first('phone') }}</div>
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
                <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{$model->status == 0 ? 'selected' : '' }}>Inativo</option>;
                        <option value="1" {{$model->status == 1 ? 'selected' : '' }}>Ativo</option>;
                    </select>
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Foto:</label>
                <input type="file" id="avatar" name="avatar"
                    class="form-control" value="{{ $model->avatar ?? '' }}">
                @if ($errors->has('avatar'))
                    <div class="text-danger">{{ $errors->first('avatar') }}</div>
                @endif
            </div>
        </div>





        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($model) && $model != null ? 'Atualizar' : 'Cadastrar' }}</button>
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

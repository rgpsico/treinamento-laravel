<x-layout title="Register">
    <div class="container p-5">
        <x-alert />


        <div class="col-12">
            <h1>Cadastrar Comércio </h1>
        </div>
        <form action="{{ route('comercio.store') }}" method="POST" id="formRegister" enctype="multipart/form-data">

            @csrf
            <div class="row">

                <div class="form-group col-12">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        placeholder="Ex: Padaria da Estrada" value="{{ old('nome') }}">
                    @if ($errors->has('name'))
                        <span class="help-block text-danger ">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                    <input type="hidden" name="status" value="0">

                <div class="form-group col-12">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" descricao="descricao"
                        placeholder="Ex: Vendemos de tudo , pão , leite etc" value="{{ old('descricao') }}">
                    @if ($errors->has('descricao'))
                        <span class="help-block text-danger ">
                            <strong>{{ $errors->first('descricao') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="telefone">Categoria:</label>
                   <select name="categoria" id="categoria" class="form-control">
                    <option value="">Selecione</option>
                   @if(isset($categorias) && $categorias != null)
                        @foreach ($categorias as $cat )
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    @endif  
                       
                   </select>
                   
                </div>

                <div class="form-group col-12">
                    <label for="telefone">Telefone:</label>
                    <input type="telefone" class="form-control" id="telefone" name="telefone" placeholder="9999-9999"
                        value="{{ old('telefone') }}">
                    @if ($errors->has('telefone'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="endereco">Endereço:</label>
                    <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Saint roman"
                        value="{{ old('endereco') }}">
                    @if ($errors->has('endereco'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="imagem">Logo:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" placeholder="avatar"
                        value="{{ old('avatar') }}">
                    @if ($errors->has('avatar'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                </div>
               

            </div>
            <div class="form-group">
                <button class="buttons login_btn register_btn" name="login" value="Login">
                    Continue
                </button>
            </div>
        </form>
    </div>
</x-layout>

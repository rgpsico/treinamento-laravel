<x-layout title="Register">
    <div class="container p-5">
        <x-alert />


        <div class="col-12">
            <h1>Cadastrar {{$pageTitle}} </h1>
        </div>
        <form action="{{ route('comercio.store') }}" method="POST" id="formRegister" enctype="multipart/form-data">

            @csrf
            <div class="row">

                <div class="form-group col-12">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Nome: Felipe Silva" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block text-danger ">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                    <input type="hidden" name="status" value="0">

            
           
                <div class="form-group col-12">
                    <label for="telefone">Telefone:</label>
                    <input type="telefone" class="form-control" id="telefone" name="telefone" placeholder="(21) 9999-9999"
                        value="{{ old('telefone') }}">
                    @if ($errors->has('telefone'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="imagem">Foto:</label>
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
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</x-layout>

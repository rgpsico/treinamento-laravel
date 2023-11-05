<x-layout title="Register">
    <div class="container p-5">
        <x-alert />


        <form action="{{ route('user.store') }}" method="POST" id="formRegister" enctype="multipart/form-data">

            @csrf
           <div class="row">          
                   
            <div class="form-group col-12">
                <label for="name">Função:</label>
                <select name="type" id="type" class="form-control" onchange="handleSelectChange(this)">
                    @foreach ($tipoUser as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nome }}</option>
                    @endforeach
                    <optgroup label="----------------">
                        <option value="addNew"><button class="btn btn-success" id="addFuncao">+ Cadastrar Nova Função</button></option>
                    </optgroup>
                </select>
            </div>

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

                <div class="form-group col-12">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="9999-9999"
                        value="{{ old('telefone') }}">
                    @if ($errors->has('telefone'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('telefone') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="confirm_password">Confirmar Senha:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    @if ($errors->has('confirm_password'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-12">
                    <label for="foto">Foto</label>
                    <input type="file" name='avatar' id="avatar" class="form-control">
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

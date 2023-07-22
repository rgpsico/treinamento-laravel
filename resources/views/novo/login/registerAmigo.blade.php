<x-layout title="Register">
    <div class="container p-5">
        <x-alert />


        <form action="{{ route('user.storeIndicacao') }}" method="POST" id="formRegister" enctype="multipart/form-data">

            @csrf
           <div class="row">
          
                <x-select :options="config('options.select_profissionais')" name="type" label="Função" selected="Selecione" col='12' />
                   
           

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

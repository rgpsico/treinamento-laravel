<x-layout title="Register">
    <div class="container p-5">
      @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
      @endif

     
        <form action="{{ route('user.store') }}" method="POST" id="formRegister" enctype="multipart/form-data">

            @csrf
            <div class="row">

                <div class="form-group col-12">
                    <label for="isProprietario">Estou buscando Imovel:</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Selecione</option>
                        <option value="1">Estou procurando uma casa/kitnet para alugar</option>
                        <option value="2">Tenho uma Casa/Kitnet e quero alugar</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="help-block text-danger ">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>

              <div class="form-group col-12">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block text-danger ">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group col-12">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group col-12">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group col-12">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group col-12">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                @if ($errors->has('confirm_password'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
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

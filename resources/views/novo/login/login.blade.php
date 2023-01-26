<x-layout title="Login">
<div class="container p-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('user.login')}}"  method="POST" id="registerForm">
        @csrf
        @method('POST')
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
          
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="password">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-group">
        <button  class="buttons login_btn" name="login" value="Login" id="loginCria">
            Continue 
        </button>
    </div>
       </form>
    </div>  
    </x-layout>
    
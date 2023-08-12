<x-layout title="Login">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
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
  
      <div class="card p-5">
          <h3 class="mb-4">Login</h3>
          <form action="{{route('user.login')}}"  method="POST" id="registerForm">
              @csrf
              @method('POST')
              <div class="form-group has-feedback">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
              </div>
  
              <div class="form-group has-feedback">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  @error('password')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>
            
              <button class="btn btn-primary btn-block" name="login" value="Login" id="loginCria">Continue</button>
              <div class="text-center mt-3">
                  <small>Or</small>
              </div>
              <a href="{{ route('login.google') }}" class="btn btn-light btn-block text-left google">
                  <img src="{{asset('images/google_p.png')}}" alt="Google Login" width="20px"> Continue Com Google
              </a>
              
          </form>
      </div>
  </div>
  
  </x-layout>
  
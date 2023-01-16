<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Logar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">
              <img src="{{asset('images/close.png')}}"  alt="Classified Plus">
            </span> 
          </button>
        </div>
        <div class="modal-body">
        <div class="list-unstyled list-inline social-login">
           </div>
           <form action="{{route('user.login')}}"  method="POST" id="registerForm">
            @csrf
            @method('POST')
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="password">
              </div>
            </div>
          </div>
          <div class="form-group">
			<button type="submit" class="buttons login_btn" name="login" value="Login">
				Continue 
			</button>
		</div>
           </form>
    <div class="form-info">
			<div class="md-checkbox">
				<input type="checkbox" name="rememberme" id="rememberme" value="forever">
				<label for="rememberme" class="">Lembrar</label>
			</div>
			<div class="forgot-password">
				 <a href="#">Esqueceu a Senha</a>
			</div>
		</div>
          
        </div>
        <div class="register text-center">Ainda não é membro?
          <a href="#" data-toggle="modal" data-target="#register">Registrar</a></div>
      </div>
    </div>
  </div>







  

  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrassr</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">
                <img src="{{asset('images/close.png')}}" alt="Classified Plus"></span> 
            </button>
        </div>
        <div class="modal-body">
        
          <form action="{{route('user.store')}}" method="POST" id="formRegister" enctype="multipart/form-data">
         
            @csrf
          <div class="row">
           
            <div class="col-sm-12 col-12">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>
            </div>

            <div class="col-sm-12 col-12">
              <div class="form-group has-feedback">
                <input type="Email" class="form-control" id="email" name="email" placeholder="E-mail">
              </div>
            </div>

            <div class="col-sm-12 col-12">
              <div class="form-group has-feedback">
                <input type="number" class="form-control" id="phone" name="phone" placeholder="(21) 9999-9999 Telefone">
              </div>
            </div>
            
            
            
            <div class="col-sm-12 col-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
            
            <div class="col-sm-12 col-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" id="password_confirme" name="password_confirme" placeholder="Confirm Password">
              </div>
            </div>
            
          </div>
          <div class="form-group">
            <button type="submit" class="buttons login_btn" name="login" value="Login">
              Continue 
            </button>
		      </div>
        </form>
          <div class="form-info">
			<p class="text-center p-b-10">Eu aceito todos os termos.</p>
		</div>
          
        </div>
        <div class="register text-center">Ja é membro?<a href="#">Login</a></div>
      </div>
    </div>
  </div>

  <script>
    register() 
    function register() {
  const form = document.querySelector('#formRegister');
  form.addEventListener('submit', e => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch(form.action, {
      method: form.method,
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log(data)
      if (data.errors) {
        Object.keys(data.errors).forEach(key => {
          const input = form.querySelector(`input[name=${key}]`);
          const error = document.createElement('div');
          error.classList.add('error');
          error.innerHTML = data.errors[key];
          input.insertAdjacentElement('afterend', error);
        });
      } else {
        // handle success
      }
    })
    .catch(error => console.log(error));
  });
}

  </script>

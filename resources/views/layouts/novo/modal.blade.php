<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- <div class="modal fade show" id="login" tabindex="-1" role="dialog" aria-hidden="true">
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
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')                   
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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

 --}}





  

  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">registrar</h5>
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
                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
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
            <button  class="buttons login_btn register_btn" name="login" value="Login">
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

<!-- Laravel Javascript Validation -->


  <script>

$(document).ready(function(){


$('.registrar_btn_modal').click(function(e){
 $('#register').modal('show')
});  
  

  const form = document.querySelector('form');
  const formData = new FormData(form);
  const name = formData.get('name');
  const email = formData.get('email');
  const phone = formData.get('phone');
  const password = formData.get('password');
  const password_confirme = formData.get('password_confirme');
  
  if(password != password_confirme ){
    alert('Password e password confirme devem ser')
    return;
  }



  function register(name, email, phone, password, password_confirme){

  fetch('/api/register', {
    method: 'POST',
    body: JSON.stringify({name, email, phone, password, password_confirme }),
    headers: {
      'Content-Type': 'application/json'
    
    }
  })
  .then((response) => {
        if(response.status != 200 ){
          alert('Erro ao caadstrar')
          return ;
        } 
        if(response.status == 200 ){
   
          window.location.href = '/list';
        }
        
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
   

  }
  

    
function login (email, password){
let data = {
  email: 'rgyr2010@hotmail.com',
  password: '12345678'
}

fetch('http://localhost:8000/api/auth', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(data)
})
.then(response => response.json())
.then(data => {
 
  let token = data.access_token;
   console.log(token)
})
.catch(error => console.error(error))
}


})
  </script>

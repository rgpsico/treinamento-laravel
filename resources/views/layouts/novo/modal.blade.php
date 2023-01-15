<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Logar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">
              <img src="images/close.png"  alt="Classified Plus">
            </span> 
          </button>
        </div>
        <div class="modal-body">
        <div class="list-unstyled list-inline social-login">
           </div>
           <form action="{{route('user.login')}}" >
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
                <input type="password" class="form-control" name="senha" placeholder="senha">
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
          <h5 class="modal-title">Registrar</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">
                <img src="images/close.png" alt="Classified Plus"></span> 
            </button>
        </div>
        <div class="modal-body">
        
         
          <div class="row">
            <form action="{{route('user.create')}}" >
              @method('POST')
              @csrf
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="Email" class="form-control" id="Email" name="Email" placeholder="E-mail">
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="number" class="form-control" id="phone" name="phone" placeholder="(21) 9999-9999 Telefone">
              </div>
            </div>
            
            
            
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" id="Confirm_password" name="Confirm_password" placeholder="Confirm Password">
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
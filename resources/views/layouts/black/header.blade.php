<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Classified Plus</title>
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/owlcarousel/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/owlcarousel/owl.theme.default.min.css')}}" />
</head>
<body>
<div class="topbar"> 
  <!-- Header  -->
  <div class="header">
    <div class="container po-relative">
      <nav class="navbar navbar-expand-lg hover-dropdown header-nav-bar"> 
        <a href="{{route('novo.home')}}" class="navbar-brand">
            <img src="{{asset('images/logo.png')}}" alt="Classified Plus"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h5-info"
         aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="h5-info">
          <ul class="navbar-nav">
            <li class="nav-item dropdown"> 
                <a class="nav-link dropdown-toggle" href="{{route('novo.home')}}"
                 data-toggle="dropdown" 
                 aria-haspopup="true" aria-expanded="false"> Home </a>
            
            <li class="nav-item">
                 <a class="nav-link"  href="{{route('novo.categoria')}}">Serviços</a>
            </li>         
           
                   
          </ul>
          <div class="header_r d-flex">
            <div class="loin"> <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user m-r-5"></i>Register/Sign In</a>  </div>
            <ul class="ml-auto post_ad">
              <li class="nav-item search"><a class="nav-link" href="20-Post_Ad-Page.html">Post Your Ad</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
    <!-- Modal -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login to Classifieds Plus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img src="images/close.png"  alt="Classified Plus"></span> </button>
        </div>
        <div class="modal-body">
        <div class="list-unstyled list-inline social-login">
        <a href="#" class="facebook"> <img src="images/fb.png" alt="Classified Plus">Continue wiith Facbook</a>
        <a href="#" class="google"> <img src="images/google_p.png" alt="Classified Plus"> <span>Continue with Google</span></a>
        </div>
          <div class="or-divider">
            <h6>or</h6>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="log_username" placeholder="Email/Username">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="log_password" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="form-group">
			<button type="submit" class="buttons login_btn" name="login" value="Login">
				Continue 
			</button>
		</div>
          <div class="form-info">
			<div class="md-checkbox">
				<input type="checkbox" name="rememberme" id="rememberme" value="forever">
				<label for="rememberme" class="">Remember me</label>
			</div>
			<div class="forgot-password">
				<a href="#">Forgot password?</a>
			</div>
		</div>
          
        </div>
        <div class="register text-center">Not a member yet? <a href="#" data-toggle="modal" data-target="#register">Register</a></div>
      </div>
    </div>
  </div>
  
    <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login to Classifieds Plus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img src="images/close.png" alt="Classified Plus"></span> </button>
        </div>
        <div class="modal-body">
        <div class="list-unstyled list-inline social-login">
        <a href="#" class="facebook"> <img src="images/fb.png" alt="Classified Plus">Continue wiith Facbook</a>
        <a href="#" class="google"> <img src="images/google_p.png" alt="Classified Plus"> <span>Continue with Google</span></a>
        </div>
          <div class="or-divider">
            <h6>or</h6>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="log_username" placeholder="Name">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="number" class="form-control" id="Phone_No" name="log_password" placeholder="Number">
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="Email" class="form-control" id="Email" name="Email" placeholder="Email">
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="log_password" placeholder="Password">
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
          <div class="form-info">
			<p class="text-center p-b-10">By Register I agree to receive emails.</p>
		</div>
          
        </div>
        <div class="register text-center">Already a member? <a href="#">Login</a></div>
      </div>
    </div>
  </div>
  <!-- End Header  --> 
</div>

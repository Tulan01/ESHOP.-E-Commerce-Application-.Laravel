 @extends('layoutduo')
 @section('conta')
 <p class="alert-danger"><?php
					$massage = Session::get('massage');
					if($massage){
					echo $massage;
					Session::put('massage',null);
				     }
					?></p>

<section id="form"><!--form-->
		<div class="container col-md-12">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				
			
					<div class="login-form">
                           

				        <!--login form-->
						<h2>Login to your account</h2>
						<form action="{{route('douserlogin')}}" method="POST">
							@csrf
							<input type="email" name="cus_email" placeholder="email" required="" />
							<input type="password" name="cus_password" placeholder="password"  required="" />
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('usersignup')}}" method="POSt">
							@csrf
							<input type="text" name="cus_name" placeholder="Your Name"/>
							<input type="email" name="cus_email" placeholder="Email Address"/>
							<input type="password" name="cus_password" placeholder="Password"/>
							<input type="text" name="cus_mobile" placeholder="Mobile"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


  @endsection
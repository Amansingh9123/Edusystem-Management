<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Student Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="user_login_assets/fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="user_login_assets/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="user_login_assets/images/image-1.png" alt="" class="image-1">
				@if(session('$message'))
        {{session('message')}}
        @endif
				<form action="{{url('/registration')}}" method="post" enctype="multipart/form-data">
					@csrf
					<h3>New Account?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="name" placeholder="Name">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control"  name="phone" placeholder="Phone Number">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" name="email" placeholder="Mail">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-home"></span>
						<input type="address" class="form-control" name="address" placeholder="Address">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-holder">
					<span class="lnr lnr-upload"></span>
                      <input type="file" class="form-control" name="image" id="exampleInputPassword1"  >
                    </div>
					
					<button>
						<span>Register</span>
					</button>
					<a href="{{url('/student_login')}}">Already Logged in?</a>
				</form>
				
				<img src="user_login_assets/images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="user_login_assets/js/jquery-3.3.1.min.js"></script>
		<script src="user_login_assets/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
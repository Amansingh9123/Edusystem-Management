<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Student Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="user_login_assets/fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="user_login_assets/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="user_login_assets/images/image-1.png" alt="" class="image-1">
				
				<form action="{{url('/login')}}" method="post" >
					@csrf
					<h3>Please Login</h3>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" name="email" placeholder="Mail">
					</div>
					
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					
					
					<button>
						<span>Login</span>
					</button>
					<a href="{{url('/student_registration')}}">Doesn't have an account?</a>
					<p class="text-danger">@if(session('message'))
        {{session('message')}}
        @endif</p>
				</form>
				
				<img src="user_login_assets/images/image-2.png" alt="" class="image-2">
			</div>
			
			
		</div>
		
		
		<script src="user_login_assets/js/jquery-3.3.1.min.js"></script>
		<script src="user_login_assets/js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
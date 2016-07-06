<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>SAO | Login</title>

		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

		<link href="/css/animate.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<link href="/css/mystyle.css" rel="stylesheet">

	</head>

	<body class="white-bg">

		<div class="loginColumns animated fadeInDown">
			<div class="row">

				<div class="col-md-6">
					<img src="/img/lpulogo.png" height="388" width="366">

				</div>
				<div class="col-md-6">
					<br>
					<br>
					<br>
		
					<h1>Login</h1>
					<div class="">
						<form class="m-t" role="form" id="loginForm" method="POST" action="/login">
							{!! csrf_field() !!}

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

								<input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" required="" autofocus="">

							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

								<input type="password" class="form-control" placeholder="Password" name="password" required="">

							</div>

							@if (count($errors) > 0)

							@foreach ($errors->all() as $error)
							<div class="alert alert-danger">
								{{ $error }}
							</div>
							@endforeach
							@endif
							<button type="submit id="loginBtn" class="btn btn-lpu block full-width m-b">
							Login
							</button>
							<div class="text-center">
							<a href="/register"><small>Create an account</small></a>
							</div>
							<!--
							<a href="#">
							<small>Forgot password?</small>
							</a>

							<p class="text-muted text-center">
							<small>Do not have an account?</small>
							</p>
							<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->

							</form>
							<!--
							<p class="m-t">
							<small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
							</p>-->

							</div>
							</div>
							</div>

							</div>
							<br><br><br><br>
							<hr/>
							<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center">
							Lyceum of the Philippines University Cavite
							<br>
							<small>Copyright © 2016 · All Rights Reserved</small>
					</div>
					<div class="col-md-6 ">

					</div>
				</div>
	</body>

</html>

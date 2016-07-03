<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>SAO | Register</title>

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
					<div class="">
						<form class="m-t" role="form" method="post" action="/register">
							{!! csrf_field() !!}

							<div class="form-group">

								<input type="text" class="form-control" placeholder="Name"  name="name" value="">
							</div>

							<div class="form-group">

								<input type="email" class="form-control" placeholder="Email" name="email" value="">
							</div>

							<div class="form-group">

								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>

							<div class="form-group">

								<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
							</div>

							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>
										{{ $error }}
									</li>
									@endforeach
								</ul>
							</div>
							@endif

							<div>
								<button type="submit" class="btn btn-lpu block full-width m-b">
									Register
								</button>
							</div>
						</form>
						<!--
						<p class="m-t">
						<small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
						</p>-->

					</div>
				</div>
			</div>
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
		</div>

	</body>

</html>


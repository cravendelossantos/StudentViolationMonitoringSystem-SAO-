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

		<div class="loginColumns1 ">
			
			<div class="row">

				<div class="col-md-5 animated fadeInLeft">

					<center><img src="/img/lpu.png" class="img-responsive" alt="SAO-IS Logo"></center>
	<h1>Login</h1>
					<div class="">
						<form class="m-t" role="form" id="loginForm" method="POST" action="{{ url('/login') }}">
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
							<button type="submit" id="loginBtn" class="btn btn-lpu block full-width m-b">
							Login
							</button>
							<a href="/password/reset"><center><small>Forgot password?</small></center></a>

					
							
							</form>
						

							</div>


				</div>



				<div class="col-md-offset-1 col-md-6 animated fadeInRight" style="text-align: justify;">

					<h2><strong class="lpu-text">Vision</strong></h2>
					<p>An internationally accredited university dedicated to innovation and excellence in the service of God and country.</p>
					<h2><strong class="lpu-text">Mission</strong></h2>
					<p>The Lyceum of the Philippines University - Cavite, espousing the ideals of Jose P. Laurel, is committed to the following mission:</p>
					<ol>
						<li>Advance and preserve knowledge by undertaking research and disseminating and utilizing the results. - <strong>RESEARCH</strong></li>
						<li>Provide equitable access to learning through relevant, innovative, industry-based and environment-conscious programs and services in the context of nationalism and internationalism. - <strong>INSTRUCTION</strong> and <strong>QUALITY SERVICES</strong></li>
						<li>Provide necessary knowledge and skills to meet entrepreneurial development and the managerial requirements of the industry. - <strong>INSTRUCTION</strong></li>
						<li>Establish local and international linkages that will be the source of learning and growth of the members of academic community. - <strong>INSTRUCTION</strong> and <strong>INSTITUTIONAL</strong><strong> DEVELOPMENT</strong></li>
						<li>Support a sustainable community extension program and be a catalyst for social transformation and custodian of Filipino culture and heritage. - <strong>COMMUNITY EXTENSION</strong></li>
						<li>Build a community of God-centered, nationalistic, environment conscious, and globally competitive professionals with wholesome values and attitudes. - <strong>PROFESSIONALISM</strong> and <strong>VALUES</strong></li>

					</div>
				</div>

			</div>
							
							<hr/>
							<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center fixed">
							Lyceum of the Philippines University Cavite
							<br>
							<small>Copyright © 2016 · All Rights Reserved</small>
					</div>
				
				</div>
	</body>

</html>

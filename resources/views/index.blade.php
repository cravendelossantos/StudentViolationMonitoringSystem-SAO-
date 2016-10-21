@extends('layouts.master')

@section('title', 'SAO | Home')
@section('header-page')

<div class="row">
	<div class="col-lg-12">


		<div class="widget style1 animated fadeInRight">
			
			<div class="col-lg-1">
				
				@if ( $greeting  == 'Good Afternoon' )
				<i class="fa fa-cloud fa-5x"></i>
				@elseif ( $greeting  == 'Good Morning' )    
				<i class="fa fa-sun-o fa-5x"></i>
				@elseif ( $greeting  == 'Good Evening' || $greeting  == 'Good Night' ) 
				<i class="fa fa-moon-o fa-5x"></i>
				@endif	
				
			</div>

			<div class="col-lg-11">

				<p><h2>{{ $greeting }}, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>
				<small>&nbsp;Welcome to Student Affairs Office Information System</small></p>
			</div>
			
		</div>
		
		
	</div>

</div>


@endsection


@section('content')

<div class="row">
	<div class="col-lg-12  article">
		<div class="ibox float-e-margins">
			<div class="ibox-content animated fadeInUp">
				<center>
					<img src="/img/logoBig.png" class=" animated fadeInDown" alt="SAO-IS Logo"> 
					<br>	<br>
				</center>
				
				<div class="text-center ">
					

					<h1 class="lpu-text"><strong>STUDENT AFFAIRS OFFICE</strong></h1>
					<br>
					<br>
				</div>
				<div class="row">

					<div class="col-md-12">
						<p style="text-align: justify;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Student Affairs Office (SAO) supports programs that encourage the concept of total student development. It is commited to provide an enviroment conducive to personal, social, emotional, spiritual, and organizational development through involvement in student governance and activities. It continues to plan, implement, evaluate, and support programs and services to meet students needs.
							<br>
							<br>
						</p>

					</div>
				</div>

				<div class="row">

					<div class="col-md-12">
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The SAO offers services to the students in the following areas:

						</p>
						
						<p>

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. <b>Student Welfare</b>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1. Orientation and Awareness</i>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2. Student Handbook Development</i>

						</p>
						<p>

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. <b>Student Development</b>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.1. Student Organizations and Activities</i>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2. Leadership Training</i>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3. Student Government</i>

						</p>
						<p></i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4. Student Discipline</i>

						</p>
						<p>

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. <b>Other Student Service</b>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.1. Lockers</i>

						</p>
						<p><i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.2  Lost and Found</i>

						</p> 
					</div>
				</div>

				<br>
				<br>
				<br>
				<div class="row">

					<div class="col-md-12">
						<p>
							<h2 class="lpu-text"><strong>Educational Philosophy</strong></h2>
							<p>
								<em>Lyceum of the Philippines University - Cavite</em>, an institution of higher learning, inspired by the ideals of Philippine President Jose P. Laurel, is committed to the advancement of his philosophy and values:
							</p>
							<blockquote>
								<em>"Veritas et Fortitudo" (truth and fortitude) "Pro Deo et Patria" (for God and Country).</em>
							</blockquote>

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2 class="lpu-text"><strong >Core Values</strong></h2>
							<table style="width: inherit; height: 146px;" border="0" align="center">
								<tbody>
									<tr>
										<td><span style="font-size: x-large;"><strong>L -</strong> Love of God</span></td>
										<td><span style="font-size: x-large;"> </span></td>
										<td><span style="font-size: x-large;"><strong>J -</strong> Justice</span></td>
									</tr>
									<tr>
										<td><span style="font-size: x-large;"><strong>P -</strong> Professional Integrity</span></td>
										<td><span style="font-size: x-large;"><strong>N -</strong> Nationalism</span></td>
										<td><span style="font-size: x-large;"><strong>P -</strong> Perseverance</span></td>
									</tr>
									<tr>
										<td><span style="font-size: x-large;"><strong>U -</strong> Unity</span></td>
										<td><span style="font-size: x-large;"> </span></td>
										<td><span style="font-size: x-large;"><strong>L -</strong> Leadership</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</p>

				<hr>

				<div class="pull-right">

					<button class="btn btn-white btn-xs" type="button">
						Team ACID
					</button>
				</div>

			</div>

		</div>
	</div>
</div>

@endsection


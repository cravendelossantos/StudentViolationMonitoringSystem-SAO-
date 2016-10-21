@extends('layouts.master')

@section('title', 'SAO | User Management')





@section('header-page')
<div class="col-lg-12">
	<h1>Create a new account</h1>
</div>

@endsection


@section('content')

<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">

			<div class="ibox-content">
<h3>Personal Information</h3>

			<div class="row">

		
				<div class="col-md-12">
	
					<form class="m-t" role="form" id="regFormAdmin" method="" action="">

					
					{{ csrf_field() }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
					
					<div class="col-md-6">
<div class="form-group">

					<input type="text" class="form-control"  style="text-transform: capitalize;" name="first_name" value="{{ old('first_name')}}" placeholder="First name" autocomplete="off" required autofocus>
					</div>
					</div>

					<div class="col-md-6">
					<div class="form-group">
	
					<input type="text" class="form-control"  style="text-transform: capitalize;" name="last_name" value="{{ old('last_name') }}"  placeholder="Last name" autocomplete="off" required>
					</div>
					</div>

					</div>
									<div class="row">
					
					<div class="col-md-6">
<div class="form-group">
      
							<div class="form-group" id="reg_bday">

									<div class="input-group date" id="data_1">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" id="birthdate" name="birthdate" class="form-control" placeholder="Birthdate">
									</div>
								</div>
					</div>
					</div>
							<div class="col-md-6">
<div class="form-group">

				<div class="input-group m-b"><span class="input-group-addon">+63</span> <input type="text" placeholder="Contact No.	" class="form-control" id="contact_number" name="contact_number" maxlength="10"></div>
					</div>
					</div>
			
					
					</div>

						<div class="row">
					
					<div class="col-md-12">
<div class="form-group">
      <textarea class="form-control" placeholder="Address" id="address" name="address" style="resize: vertical; text-transform: capitalize;"></textarea>
      </div>
      </div>
      </div>

				<hr/>
				<h3>Account Credentials</h3>
					<br>
					<div class="form-group">
					<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off">
					</div>
					<div class="form-group">

					<input type="password" class="form-control" placeholder="Password" name="password">
					</div>

					<div class="form-group">

					<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
					</div>

					<div class="form-group">
						<select class="form-control" name="user_type" id="user_type">
							<option disabled="" selected="">Select user type</option>
							@foreach ($roles as $role)
							<option>{{ $role->name }}</option>
							@endforeach
						</select>

					</div>



					<div>
					<button type="button" id="register_admin_btn" class="btn btn-lpu block full-width m-b">
					Submit
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



		</div>
	</div>
</div>		


@endsection

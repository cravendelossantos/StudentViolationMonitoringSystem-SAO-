@extends('layouts.master')

@section('title', 'SAO | My Profile')

@section('header-page')
<div class="col-md-12">
	@if ($message = Session::get('success'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('success') }}
	</div>
	@endif
	<div>
		<img src="/img/avatars/{{ Auth::user()->avatar }}" class="img-circle"  height="180px" width="180px" style="float:left; border-radius: 50%; margin-right: 30px;">
	</div>
	<h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->roles->first()->description }})</h1>
	<h5>{{ Auth::user()->email }}</h5>

	<hr/>
	<form enctype="multipart/form-data" action="/upload/avatar" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label>Change Profile Image</label>
		<i class="fa fa-picture-o"></i>
		<input type="file" name="avatar" class="btn btn-white btn-xs">
		</label>
		<input type="submit"  class="pull-right btn btn-sm btn-primary" value="Save">

	</form>

</div>

@endsection

@section('content')

<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<h3>Update your account</h3>
				<hr/>

				<form class="m-t" role="form" id="account_update" method="post" action="">
					{{ csrf_field() }}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control"  style="text-transform: capitalize;" name="first_name" value="{{ Auth::user()->first_name }}" placeholder="First name" autocomplete="off" required autofocus>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control"  style="text-transform: capitalize;" name="last_name" value="{{ Auth::user()->last_name }}"  placeholder="Last name" autocomplete="off" required>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>E-mail</label>
								<input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ Auth::user()->email }}" autocomplete="off">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Birth Date</label>
								<div class="form-group" id="reg_bday">

									<div class="input-group date" id="data_1">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input readonly="" type="text" id="birthdate" name="birthdate" class="form-control" placeholder="Birthdate" value="{{ Auth::user()->birthdate }}">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>Contact Number</label>
								<div class="input-group m-b">
									<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
									<input type="text" placeholder="Contact No.	" class="form-control" id="contact_number" name="contact_number" maxlength="13" value="{{ Auth::user()->contact_no }}">
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-12">
							<div class="form-group">
								<label>Adress</label>
								<textarea class="form-control" placeholder="Address" id="address" name="address" value="" style="resize: vertical; text-transform: capitalize;">{{ Auth::user()->address }}</textarea>
							</div>
						</div>
					</div>
					<div>
						<button type="button" id="update_account_btn" class="btn btn-lpu block full-width m-b">
							Save
						</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#update_account_btn').click(function(e) {
		e.preventDefault();

		$.ajax({
			type : "GET",
			url : "/profile/edit/check",
			data : $('form#account_update').serialize(),

		}).fail(function(data) {
			var errors = $.parseJSON(data.responseText);
			var msg = "";

			$.each(errors.errors, function(k, v) {
				msg = msg + v + "\n";
				swal("Oops...", msg, "warning");

			});

		}).done(function(data) {

			swal({
				title : "Are you sure?",
				text : "This will update your account details",
				type : "warning",
				showCancelButton : true,
				confirmButtonColor : "#DD6B55",
				confirmButtonText : "Submit",
				closeOnConfirm : true
			}, function() {
				$.ajax({
					headers : {
						'X-CSRF-Token' : $('input[name="_token"]').val()
					},
					type : "POST",
					url : "/profile/edit",
					data : $('form#account_update').serialize(),
				}).done(function(data) {

					$('form#account_update').each(function() {
						this.reset();
					});
					window.location.reload();
				});
			});
		});

	});

</script>

@endsection
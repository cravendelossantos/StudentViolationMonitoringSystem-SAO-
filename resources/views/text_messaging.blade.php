@extends('layouts.master')

@section('title', 'SAO | Text Messaging')

@section('header-page')
<div class="col-md-12">
	<h1>Send a Text Message</h1>
	<form action="/modem-test" method="get">
	<div class="form-group">
	<button class="btn btn-primary">Test Modem Connection</button>
	</div>
	</form>
	<form action="/modem-info" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
	<button class="btn btn-primary">Device Status</button>
	</div>
	</form>
</div>

@endsection

@section('content')

<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">


			<div class="ibox-title">
				<h5>Compose a message</h5>
			</div>

			<div class="ibox-content">
				@if ($message = Session::get('response'))
				<div class="alert alert-info" role="alert">
					{{ Session::get('response') }}
				</div>
				@endif


				<form action="/text-messaging/send" method="POST" id="text-messaging-form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label>Mobile No.</label>
						<input type="text" value="" name="mobile_number" id="mobile_number" class="form-control" data-role="tagsinput" >

					</div>
					<div class="form-group">
						<textarea name="message" id="message" placeholder="Enter your message here" class="form-control"></textarea>
					</div>


				</div>

				<div class="ibox-footer">
					<button class="btn btn-w-m btn-primary" id="send_btn" type="submit">
						<span class="fa fa-send"></span>&nbsp;<strong>Send</strong>
					</button>

				</form>
			</div>

		</div>
	</div>

</div>


<!-- 
<div class="row">

	<div class="col-md-6 animated fadeInRight">

		<div class="panel panel-primary">
			<div class="panel-heading">USSD Code Dialer</div>
			<div class="panel-body">
				@if ($message = Session::get('ussd'))
				<div class="alert alert-info" role="alert">
					{{ Session::get('ussd') }}
				</div>
				@endif

				<form method="POST" action="/getussd">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group ">
						<label>Enter USSD Code</label>
						<input type="text" value="" name="ussd_code" id="ussd_code" class="form-control" placeholder="ex. *143*5*2#" >
					</div>
					<div class="form-group">	
						<button class="btn btn-w-m btn-primary" id="send_btn" type="submit">
							<span class="glyphicon glyphicon-earphone"></span>&nbsp;<strong>Dial</strong>
						</button>
					</form>
				</div>

			</div>

			
		</div>
	</div>
 -->


<style>


	textarea { 
		resize:vertical;

	}

	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 0; 
	}
</style>


<script type="text/javascript">
	



</script>
@endsection
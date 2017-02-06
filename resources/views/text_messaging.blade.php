@extends('layouts.master')

@section('title', 'SAO | Text Messaging')

@section('header-page')
<div class="col-md-12">
	<h1>Send a Text Message</h1>

	<hr>	
	
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        
    </div>
	@endif

	@if ($message = Session::get('api_code_response'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('api_code_response') }}
		</div>
	@endif

	<div class="form-group pull-right">
		<form action="/text-messaging/api_code/update" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label>API Code</label>
				
				<br>

				<div class="input-group" style="width: 300px;">
					<input type="hidden" name="api_code_id" value="{{ $keys->id }}">
					<input type="text" name="api_code" class="form-control" placeholder="Your API Code" value="{{ $keys->api_code }}">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">Save</button>
					</span>
				</div>
				<!-- <input type="text" name="" class="form-control pull-right" value="">
			<input type="submit"  class="pull-right btn btn-sm btn-primary" value="Save"> -->
		</form>		
	</div>
	
	<div class="form-group">
		@if (count($credits) == null)
			<label id="available-credits" style="color: red;">Failed to communicate with the SMS server. Please check your connection</label>
		@else
			<label><h3>Available Credits:</label>
			<label id="available-credits" style="color: green;"> {{ $credits }} </h3></label>
		@endif
		<br>
		<a class="btn btn-success btn-rounded btn-sm" href="https://www.itexmo.com/Developers/packages/index.php"><i class="fa fa-money"></i>&nbsp;Buy package from iTexMo.com</a>
	</div>


	
	

	<!-- <form action="/modem-test" method="get">
	<div class="form-group">
	<button class="btn btn-primary">Test Modem Connection</button>
	</div>
	</form>
	<form action="/modem-info" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
	<button class="btn btn-primary">Device Status</button>
	</div>
	</form> -->
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
					<input type="hidden" name="api_key" value="{{ $keys->api_code }}">
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
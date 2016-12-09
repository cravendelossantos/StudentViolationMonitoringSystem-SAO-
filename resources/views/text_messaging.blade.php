@extends('layouts.master')

@section('title', 'SAO | Text Messaging')

@section('header-page')
<div class="col-md-12">
	<h1>Send a Text Message</h1>
</div>

@endsection
	
@section('content')

<div class="row">

<div class="col-md-12 animated fadeInRight">

<div class="ibox-title">
<h5>Compose a message</h5>
</div>

<div class="ibox-content">
<form action="/text-messaging/send" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
									<label>Mobile No.</label>
									<input type="number" value="" name="mobile_number" id="mobile_number" class="form-control">
									
								</div>
<div class="form-group">
<textarea name="message" id="message" placeholder="Enter your message here" class="form-control"></textarea>
</div>


</div>

<div class="ibox-footer">
<button class="btn btn-w-m btn-primary" id="send_btn" type="submit">
								<strong>Send</strong>
							</button>

</form>
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

@endsection
@extends('layouts.master')

@section('title', 'SAO | Locker Management')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>

@endsection


@section('content')


<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Report Lost Item</h5>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="add_locker_form" method="POST" action="/lockers/add">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>No of lockers</label>
								<input type="number" placeholder="Item Description" name="no_of_lockers" id="no_of_lockers" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">

						
							<div class="form-group">
								<label>Location</label>
								<select name="floor_no" id="floor_no" class="form-control">
									<option>1st Floor</option>
									<option>2nd Floor</option>
									<option>3rd Floor</option>
									<option>4th Floor</option>
								</select>

									<select name="location" id="location" class="form-control">
									<option>JPL</option>
									<option>SHL</option>
								</select>
							
							</div>



						</div>

						
						


					</div>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="add_locker_btn" type="button">
					<strong>Save</strong>
				</button>
				<button class="btn btn-w-m btn-danger" id="add_locker_cancelBtn" type="button">
					<strong>Cancel</strong>
				</button>
				<input type="hidden" value="{{Session::token()}}" name="_token">
				</form>
			</div>

		</div>

	</div>
</div>





@endsection

<script>
	
</script>

<style>
	
.locker-damaged{
height: 120px;
width: 75px;
margin-left: 20px;
background-color: red;
}

	
.locker-available{
height: 120px;
width: 75px;
margin-left: 20px;
background-color: green;
}

.locker-occupied{
height: 120px;
width: 75px;
margin-left: 20px;
background-color: blue;
}
</style>
@extends('layouts.master')

@section('title', 'SAO | Locker Management')

@section('header-page')
<div class="row col-lg-12">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>

@endsection


@section('content')


<div id="lockers_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Claim Item</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal" id="update_locker">
					{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Locker no</label>
							<input class="form-control" name="m_locker_no" id="m_locker_no">
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>


					<div class="form-group">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Item</label>
							<input class="form-control" name="m_location" id="m_location">
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group">

						<div class="col-md-10 col-md-offset-1">

						<label class="control-label">Update status</label><br>
									<div class="radio"><label> <input type="radio" value="1" id="m_status_available" name="m_update_status"> Available </label></div>

						
									<div class="radio"><label> <input type="radio" value="2" id="m_status_occupied" name="m_update_status"> Occupied </label></div>
									<input type="text" name="m_lessee" id="m_lessee" class="form-control"> 

									<div class="radio"><label> <input type="radio"  value="3" id="m_status_damaged" name="m_update_status"> Damaged </label></div>


									<div class="radio"><label> <input type="radio"  value="4" id="m_status_locked" name="m_update_status"> Locked </label></div>	

									

							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

	
							
			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="locker_update" type="button">
					<strong>Save</strong>
				</button>
				<button type="button" class="btn btn-w-m btn-danger"
				data-dismiss="modal">
					<strong>Cancel</strong>
				</button>
				</form>
			</div>
		</div>

	</div>
</div>



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
									<!-- <label>Building</label>

									<select name="location" id="location" class="form-control">
									<option>JPL</option>
									<option>SHL</option>
									<option>New</option>
								</select> -->
								

								<label>Location</label>
								<select name="location" id="location" class="form-control">
									@foreach ($locations as $location)
									<option>{{ $location->location }}</option>

									@endforeach
									<option value="new">New location</option>
								</select>	

							<input type="text" name="new_location" id="new_location" class="form-control">
							</div>



						</div>

						
						<div class="col-md-6">
								<div class="col-md-6">
							<div class="form-group ">
								<label>Locker number</label>
								<input type="number" placeholder="From" name="from" id="from" class="form-control" autofocus="" aria-required="true">
								
								<input type="number" placeholder="To" name="to" id="to" class="form-control" autofocus="" aria-required="true">
							</div>
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


<div class="row ">
<div class="col-lg-12">

		<div class="ibox">
			<div class="ibox float-e-margins">

				<div class="ibox-title">
				

				</div>

				<div class="ibox-content" id="table-content">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover lockers-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
							<thead>
						
									<th>Locker no</th>
									<th>Location</th>
									<th>Lessee</th>
									<th>Status</th>
									
								
								

				
							</thead>

		

						</table>
						</div>
					</div>
				</div>
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
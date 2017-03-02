@extends('layouts.master')

@section('title', 'SAO | Sanction Monitoring')

@section('header-page')
<div class="row">
	<div class="col-md-12">
		<h1>Sanction Monitoring</h1>

	</div>
</div>
@endsection

@section('content')

<link href="/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
<link rel="stylesheet" href="/css/datepick/jquery.datepick.css">

<script src="/js/plugins/clockpicker/clockpicker.js"></script>
<script type="text/javascript" src="/js/jquery.plugin.datepick.js"></script>
<script type="text/javascript" src="/js/jquery.datepick.js"></script>
<div class="row">
	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">

			<div class="ibox-content">

				<div class="row">
					<div class="col-md-6">
						{!! csrf_field() !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

					</div>
				</div>
				<div class="panel blank-panel">

					<div class="panel-heading">

						<div class="panel-title m-b-md">

						</div>
						<div class="panel-options">

							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab-1">Manage Sanctions</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab-2">Community Service</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab-3">Suspensions</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#tab-4">Exclusions</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="panel-body">

						<div class="tab-content">
							<div id="tab-1" class="tab-pane active">

								<form id="sanctions_form">
									<label>Enter Student Number</label>

									<div class="input-group">

										<input type="text" id="sanction_student_no" name="sanction_student_no" class="form-control">
										<span class="input-group-btn">
											<button type="button" id="sanction_find_student" class="btn btn-primary">
												<i class="fa fa-search"></i>
											</button> </span>
									</div>
									<div class="table-responsive">
										<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

											<table class="table table-striped table-bordered table-hover sanctions-DT dataTable" id="sanctions-DT" aria-describedby="DataTables_Table_0_info" role="grid">
												<thead>
													<tr>
														<th colspan="10">
														<center>
															Click the row to update its sanction
														</center></th>
													</tr>
													<tr>

														<th>Date Committed</th>
														<th>Student No.</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Violation ID</th>
														<th>Violation Description</th>
														<th>Offense Level</th>
														<th>Offense Number</th>
														<th>Sanction</th>
														<th>Status</th>
													</tr>
												</thead>

											</table>
										</div>
									</div>
								</form>
							</div>

							<div id="tab-2" class="tab-pane">
								<div class="tab-content">
								<label>Enter Student Number</label>

								<div class="input-group">

									<input type="text" name="cs_student_no" class="form-control">
									<span class="input-group-btn">
										<button type="button" id="cs_find_student" class="btn btn-primary">
											<i class="fa fa-search"></i>
										</button> </span>
								</div>

								<br>

								<div class="panel panel-primary">
									<div class="panel-heading">
										<h4>Time Log</h4>
									</div>
									<div class="panel-body">
										<form id="time_log">

											<div class="col-md-6">
												<div class="form-group">
													<label>Student No.</label>
													<output name="time_log_student_no" id="time_log_student_no" placeholder="" ></output>
													<input type="hidden" name="_time_log_student_no" id="_time_log_student_no">
													<!-- <output name="course" id="course"></output> -->
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Name</label>
													<output name="time_log_student_name" id="time_log_student_name" placeholder="" ></output>
													<!-- <output name="course" id="course"></output> -->
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Violation ID</label>
													<output name="time_log_violation_id" id="time_log_violation_id" placeholder="" ></output>
													<input type="hidden" name="_time_log_violation_id" id="_time_log_violation_id">
													<!-- <output name="course" id="course"></output> -->
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Community Service ID</label>
													<input type="hidden" name="_time_log_cs_id" id="_time_log_cs_id">
													<output name="time_log_cs_id" id="time_log_cs_id" placeholder="" ></output>
													<!-- <output name="course" id="course"></output> -->
												</div>
											</div>

											<div class="col-md-6">
												<label>Date</label>
												<div class="input-group date" id="time_log">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													<input type="text" id="log_date" name="log_date" class="form-control">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label>Required Hours</label>
													<input type="text" class="form-control" name="time_log_required_hours" id="time_log_required_hours" placeholder="" style="font-size: 12px;" disabled="">
													<!-- <output name="course" id="course"></output> -->
												</div>
											</div>

											<div class="col-md-6">
												<label>Time in</label>
												<div class="input-group clockpicker time_in" data-autoclose="true">
													<input type="text" class="form-control" value="" name="time_in" id="time_in">
													<span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
												</div>

											</div>

											<div class="col-md-6">
												<label>Time out</label>
												<div class="input-group clockpicker time_out" data-autoclose="true">
													<input type="text" class="form-control" value="" name="time_out" id="time_out">
													<span class="input-group-addon"> <span class="fa fa-clock-o"></span> </span>
												</div>

											</div>
									</div>

									<div class="panel-footer">
										<button class="btn btn-primary " name="time_log_btn" id="time_log_btn" type="button">
											<i class="fa fa-check"></i>&nbsp;Submit
										</button>
									</div>

								</div>
								</form>
								
									<div class="table-responsive">

										<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

											<table class="table table-striped table-bordered table-hover CS-DT dataTable" id="CS-DT" aria-describedby="DataTables_Table_0_info" role="grid">
												<thead>

													<tr>
														<th>Student No.</th>
														<th>Violation ID</th>
														<th>Number of Days</th>
														<th>Number of Hours</th>
														<th>Status</th>

													</tr>
												</thead>

											</table>
										</div>
									</div>
								</div>
							</div>

							<div id="tab-3" class="tab-pane">
								<div class="tab-content">
									<div class="table-responsive center">
										<label>Enter Student Number</label>

										<div class="input-group">

											<input type="text" name="suspensions_student_no" class="form-control">
											<span class="input-group-btn">
												<button type="button" id="suspensions_student_find" class="btn btn-primary">
													<i class="fa fa-search"></i>
												</button> </span>
										</div>
										<br>
										<div class="panel panel-primary">
											<div class="panel-heading">
												<h4>Suspension Log</h4>
											</div>

											<div class="panel-body">

												<form id="suspension_log">

													<div class="col-md-6">
														<div class="form-group">
															<label>Student No.</label>
															<output name="suspension_log_student_no" id="suspension_log_student_no" placeholder="" ></output>
															<input type="hidden" name="_suspension_log_student_no" id="_suspension_log_student_no">

														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Name</label>
															<output name="suspension_log_student_name" id="suspension_log_student_name" placeholder="" ></output>

														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Violation ID</label>
															<output name="suspension_log_violation_id" id="suspension_log_violation_id" placeholder="" ></output>
															<input type="hidden" name="_suspension_log_violation_id" id="_suspension_log_violation_id">

														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Status</label>
															<output name="suspension_log_status" id="suspension_log_status" placeholder="" ></output>

														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Suspension ID</label>
															<output name="suspension_log_suspension_id" id="suspension_log_suspension_id" placeholder="" ></output>
															<input type="hidden" name="_suspension_log_suspension_id" id="_suspension_log_suspension_id">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label>Required Days</label>
															<output name="suspension_log_required_days" id="suspension_log_required_days" placeholder="" ></output>

														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label>Suspension Days</label>
															<input type="text" id="all_suspension_dates" name="all_suspension_dates" class="form-control">

														</div>
													</div>

											</div>

											<div class="panel-footer">
												<button class="btn btn-primary " name="suspension_log_btn" id="suspension_log_btn" type="button">
													<i class="fa fa-check"></i>&nbsp;Submit
												</button>
											</div>
											</form>
										</div>

										<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

											<table class="table table-striped table-bordered table-hover suspensions-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
												<thead>
													<tr>
														<th colspan="4">
														<center>
															List of Suspended Students
														</center></th>
													</tr>
													<tr>
														<th>Student No.</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Status</th>
													</tr>

												</thead>

											</table>

										</div>
									
									</div>
								</div>

							</div>

							<div id="tab-4" class="tab-pane">
								<div class="tab-content">
									<div class="table-responsive center">
										<label>Enter Student Number</label>

										<div class="input-group">

											<input type="text" name="suspensions_student_no" class="form-control">
											<span class="input-group-btn">
												<button type="button" id="suspensions_student_find" class="btn btn-primary">
													<i class="fa fa-search"></i>
												</button> </span>
										</div>
										<br>

										<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

											<table class="table table-striped table-bordered table-hover exclusion-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
												<thead>

													<tr>
														<th colspan="4">
														<center>
															List of Excluded Students
														</center></th>
													</tr>
													<tr>
														<th>Student No.</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Status</th>
													</tr>

												</thead>

											</table>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Sanctions Modal -->

<div id="sanction_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Update Sanction Status</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic" id="violation_status_update">
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="sanction_violation_id" id="sanction_violation_id">

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Student No</label>
							<output class="form-control" name="m_student_no" id="m_student_no"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Status</label>
							<select class="form-control" name="sanction_status" id="sanction_status">
								<option disabled="" selected=""></option>
								<option value="2">Completed</option>

							</select>
						</div>

					</div>

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Updated by</label>
							<output class="form-control" name="m_updated_by" id="m_updated_by">
								{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
							</output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="sanction_update_btn" type="button">
					<strong>Update</strong>
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

<!-- CS Modal -->

<div id="cs_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Add to Community Service</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic" id="add_to_cs">
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="cs_violation_id" id="cs_violation_id">

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Student No</label>
							<input type="hidden" name="cs_modal_student_id" id="cs_modal_student_id">
							<output class="form-control" name="cs_modal_student_no" id="cs_modal_student_no"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">

							<div class="row">
								<div class="col-md-6">
									<label>Days of Community Work</label>
									<input type="number" class="form-control" name="cs_days" id="cs_days">
								</div>
								<label >Total Number of Hours</label>
								<div class="col-md-6">

									<input type="text" class="form-control" name="cs_hours" id="cs_hours" readonly="">
								</div>
							</div>
						</div>
					</div>

					<!-- 	<div class="form-group claimItem">

					<div class="col-md-10 col-md-offset-1">
					<label class="control-label">Updated by</label>
					<output class="form-control" name="m_updated_by" id="m_updated_by">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</output>
					<span class="help-block m-b-none text-danger"></span>
					</div>

					</div> -->

			</div>
			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="add_to_cs_btn" type="button">
					<strong>Add</strong>
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

<!-- Suspension Modal -->

<div id="suspension_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Suspend/Exclude Student</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic" id="add_suspension">
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="suspension_violation_id" id="suspension_violation_id">

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Student No</label>
							<input type="hidden" name="_suspension_student_no" id="_suspension_student_no">
							<output class="form-control" name="suspension_student_no" id="suspension_student_no"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<input type="radio"  name="suspension_exclusion" value="Suspend">
							Suspend
							<br>
							<br>
							<input type="number" placeholder="No. of days" class="form-control" id="suspension_days" name="suspension_days">
							<br>
							<input type="radio" 	name="suspension_exclusion" value="Exclude">
							Exclude
							<br>
						</div>
					</div>

					<!-- 	<div class="form-group claimItem">

					<div class="col-md-10 col-md-offset-1">
					<label class="control-label">Status</label>
					<select class="form-control" name="suspension_status" id="suspension_status">
					<option disabled="" selected=""></option>
					<option value="2">Completed</option>

					</select>
					</div>

					</div>
					-->

					<!-- <div class="form-group claimItem">

					<div class="col-md-10 col-md-offset-1">
					<label class="control-label">Added by</label>
					<output class="form-control" name="m_updated_by" id="m_updated_by">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</output>
					<span class="help-block m-b-none text-danger"></span>
					</div>

					</div>
					-->

			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="suspension_btn" type="button">
					<strong>Submit</strong>
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

<!-- Suspension update Modal -->

<div id="suspension_update_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Update Suspension Status</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic" id="suspension_update_status">
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="suspension_id" id="suspension_id">

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Student No</label>
							<output class="form-control" name="suspended_student_no" id="suspended_student_no"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Dates</label>
							<div class="date">
								<input type="text" name="">
							</div>
						</div>

					</div>

					<div class="form-group claimItem">

						<div class="col-md-10 col-md-offset-1">
							<label class="control-label">Updated by</label>
							<output class="form-control" name="m_updated_by" id="m_updated_by">
								{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
							</output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="suspension_update_btn" type="button">
					<strong>Update</strong>
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

<script type="text/javascript">
$('#all_suspension_dates').datepick({

multiSelect: 30,
monthsToShow: 1,
showTrigger: '#calImg',
dateFormat: 'yyyy-mm-dd'
});
/*$('#suspension_datepicker .input-group.date').datepicker({
todayBtn : "linked",
keyboardNavigation : false,
forceParse : false,
calendarWeeks : true,
autoclose : false,
format : 'yyyy-mm-dd'
});

*/

$('#suspension_update_btn').click(function(e){
e.preventDefault();

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url:'/sanctions/suspended_students/update',
type: 'GET',
data: $('form#suspension_update_status').serialize(),
}).fail(function(data){

var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});
}).done(function(data){

swal({
title: "Are you sure?",
text: "This will update the status of the selected suspension",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){

$('#suspension_update_modal').modal('hide');

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url:'/sanctions/suspended_students/update',
type: 'POST',
data: $('form#suspension_update_status').serialize(),
}).done(function(data){
swal({
title: "Success!",
text: "Suspension status updated!",
timer: 1000,
type: "success",
showConfirmButton: false

});

});

suspensions_table.ajax.reload();
});

});
});

var suspensions_table = $('.suspensions-DT').DataTable({
"bPaginate" : false,
"bInfo" :false,
"bFilter" : true,
"processing": true,
"serverSide": true,
"ajax": {
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val(),
},
url : "/sanctions/suspended_students",
type: 'POST',
data: function (d) {
d.suspensions_student_no = $('input[name=suspensions_student_no]').val();
}
},

"bSort" : true,
"bFilter" : false,

"rowId" : 'id',
"columns" : [

{data : 'student_id'},
{data : 'first_name'},
{data : 'last_name'},
{data : 'status'},

],
});
var exclusions_table = $('.exclusion-DT').DataTable({
"bPaginate" : false,
"bInfo" :false,
"bFilter" : true,
"processing": true,
"serverSide": true,
"ajax": {
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val(),
},
url : "/sanctions/excluded_students",
type: 'POST',
data: function (d) {
d.suspensions_student_no = $('input[name=suspensions_student_no]').val();
}
},

"bSort" : true,
"bFilter" : false,

"rowId" : 'id',
"columns" : [

{data : 'student_id'},
{data : 'first_name'},
{data : 'last_name'},
{data : 'current_status'},

],
});

$('#suspensions_student_find').on('click', function(e) {

suspensions_table.draw();
e.preventDefault();
});

$('.suspensions-DT').on('click', 'tr', function(){
var tr_id = $(this).attr('id');

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url: "/suspension-exclusions/details",
type: "GET",
data: {
id : tr_id
},
}).done(function(data){

var msg = "";
if (data.success == false) {
$.each(data.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

} else {

if (data.response == null)
{
return false;
}

else{
if (data.response['current_status'] == "Excluded")
{
return false;
}

else{

//$('#suspension_update_modal').modal('show');

$('#suspension_log_student_no').val(data.response.student_id);
$('#_suspension_log_student_no').val(data.response.student_id);
$('#suspension_log_student_name').val(data.response.first_name + " " + data.response.last_name);
$('#suspension_log_violation_id').val(data.response.violation_id);
$('#_suspension_log_violation_id').val(data.response.violation_id);
$('#suspension_log_suspension_id').val(data.response.id);
$('#_suspension_log_suspension_id').val(data.response.id);
$('#suspension_log_required_days').val(data.response.suspension_days);
$('#suspension_log_status').val(data.response.status);

}
}
}

});
});

$('#suspension_btn').click(function(e){
$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url: "/sanctions/suspend",
type: "GET",
data: $('form#add_suspension').serialize(),
}).fail(function(data) {

var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

}).done(function(data) {

swal({
title: "Are you sure?",
text: "The record will be added to Suspensions/Exclusions records",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){
$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url: "/sanctions/suspend",
type: "POST",
data: $('form#add_suspension').serialize(),

}).done(function(data){
swal({
title: "Success!",
text: "Record saved",
timer: 1000,
type: "success",
showConfirmButton: false

});
$('form#add_suspension').each(function() {
this.reset();
});
$('#suspension_modal').modal('hide');
suspensions_table.ajax.reload();
});

});
});

});

$('#suspension_days').hide();

$("input[name='suspension_exclusion']").change(function(e){
if ($(this).val() == 'Suspend'){
$('#suspension_days').show();
} else if ($(this).val() == 'Exclude') {

$('#suspension_days').hide();
}
});

//Sanction

var sanctions_table = $('#sanctions-DT').DataTable({
"bPaginate" : false,
"bInfo" :false,
"bFilter" : true,
"processing": true,
"serverSide": true,
"ajax": {
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val(),
},
url : "/sanctions/search/student",
type: 'POST',
data: function (d) {
d.sanction_student_no = $('input[name=sanction_student_no]').val();
}
},

"bSort" : true,
"bFilter" : false,

"rowId" : 'rv_id',
"columns" : [

{data : 'date_reported'},
{data : 'student_id'},
{data : 'first_name'},
{data : 'last_name'},
{data : 'rv_id'},
{data : 'description'},
{data : 'offense_level'},
{data : 'offense_no'},
{data : 'sanction'},
{data : 'status'},

],
});

$('#sanction_find_student').on('click', function(e) {
sanctions_table.draw();
e.preventDefault();
});

$('#sanctions-DT').on('click', 'tr', function(){
var tr_id = $(this).attr('id');

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url: "/sanctions/violation-details",
type: "GET",
data: {
id : tr_id
},
}).done(function(data){

var msg = "";
if (data.success == false) {
$.each(data.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

} else {

if (data.response == null)
{
return false;
}

else if (data.response.sanction.indexOf('suspension') != -1 || data.response.sanction.indexOf('exclusion') != -1)
{
$('#suspension_modal').modal('show');

var violation_id = data.response.rv_id;
var student_no = data.response.student_id;

$('#suspension_student_no').val(student_no);
$('#suspension_violation_id').val(violation_id);
$('#_suspension_student_no').val(student_no);
suspensions_table.ajax.reload();
}

else if (data.response.sanction.indexOf('Community') != -1)
{
var violation_id = data.response.rv_id;
var student_no = data.response.student_id;

$('#cs_modal').modal('show');
$('#cs_modal_student_no').val(student_no);
$('#cs_modal_student_id').val(student_no);
$('#cs_violation_id').val(violation_id);
CS_table.ajax.reload();
}
else{
if (data.response['status'] == "Completed")
{
return false;
}

else{
$('#sanction_modal').modal('show');

var violation_id = data.response.rv_id;
var student_no = data.response.student_id;

$('#sanction_violation_id').val(violation_id);
$('#m_student_no').val(student_no);
$('#_time_log_student_no').val(student_no);
sanctions_table.ajax.reload();
}
}
}

});
});

$('#sanction_update_btn').click(function(e){
e.preventDefault();

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url:'/sanctions/update-status',
type: 'GET',
data: $('form#violation_status_update').serialize(),
}).fail(function(data){

var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});
}).done(function(data){

swal({
title: "Are you sure?",
text: "This will update the status of the selected violation",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){

$('#sanction_modal').modal('hide');

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url:'/sanctions/update-status',
type: 'POST',
data: $('form#violation_status_update').serialize(),
}).done(function(data){
swal({
title: "Success!",
text: "Violation status updated!",
timer: 1000,
type: "success",
showConfirmButton: false

});

});

sanctions_table.ajax.reload();
});

});
});

function CSdaysToHours()
{
var days = parseInt($('#cs_days').val());
var hours = (days * 8);

$('#cs_hours').val(hours);

}

$('#cs_days').on('input', function (){
CSdaysToHours();
});

$('#add_to_cs_btn').click(function (e){
e.preventDefault();

$.ajax({
url	: '/sanctions/add-to-cs',
type: 'GET',
data: $('form#add_to_cs').serialize(),

}).fail(function (data) {

var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

}).done(function (data) {
console.log($('#cs_violation_id').val());

swal({
title: "Are you sure?",
text: "This will action will add this student to community service",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},

url	: '/sanctions/add-to-cs',
type : 'POST',
data: $('form#add_to_cs').serialize(),

}).done(function(data){

$('form#add_to_cs')[0].reset();

$('#cs_modal').modal('hide');
swal({
title: "Success!",
text: "Student added to Community Service",
timer: 1000,
type: "success",
showConfirmButton: false

});
CS_table.ajax.reload();
});

});

});
});

//CS

var CS_table = $('#CS-DT').DataTable({
"bPaginate" : false,
"bInfo" :false,
"bFilter" : true,
"processing": true,
"serverSide": true,
"ajax": {
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val(),
},
url : "/community-service/search/student",
type: 'POST',
data: function (d) {
d.cs_student_no = $('input[name=cs_student_no]').val();
}
},

"bSort" : true,
"bFilter" : false,
/*	"order": [[ 0, "desc" ]],*/
"rowId" : 'id',
"columns" : [

{data : 'student_id'},
{data : 'violation_id'},
{data : 'no_of_days'},
{data : 'required_hours'},
{data : 'status'},

],
});

$('#CS-DT').on('click', 'tr', function(){
var tr_id = $(this).attr('id');

$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
url: "/community-service/cs-details",
type: "GET",
data: {
id : tr_id
},
}).done(function(data){

var msg = "";
if (data.success == false) {
$.each(data.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

} else if (data.response == null || data.response['status'] == "Completed"){
return false;
} else {


var cs_id = data.response.id;
var violation_id = data.response.violation_id;
var student_no = data.response.student_id;
var student_name = data.response.first_name + " " +  data.response.last_name;
var required_hours = data.response.required_hours;

$('#_time_log_violation_id').val(violation_id);
$('#time_log_violation_id').val(violation_id);
$('#_time_log_cs_id').val(cs_id);
$('#time_log_cs_id').val(cs_id)
$('#time_log_student_name').val(student_name);
$('#time_log_student_no').val(student_no);
$('#time_log_required_hours').val(required_hours);
}


});
});

$('#cs_find_student').on('click', function(e) {
CS_table.draw();
e.preventDefault();
});

$('#time_log .input-group.date').datepicker({
todayBtn : "linked",
keyboardNavigation : false,
forceParse : false,
calendarWeeks : true,
autoclose : true,
format : 'yyyy-mm-dd'
});

$('.time_in').clockpicker({

twelvehour: true

});

$('.time_out').clockpicker({

twelvehour: true
});

$('#time_log_btn').click(function(e){
e.preventDefault();
$.ajax({
type : "GET",
url : "/community-service/new_log",
data : $('form#time_log').serialize(),

}).fail(function(data){
var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

}).done(function(data) {

swal({
title: "Are you sure?",
text: "Addition of new log cannot be undone",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){
$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
type : "POST",
url : "/community-service/new_log",
data : $('form#time_log').serialize(),
}).done(function(data){
swal({
title: "Success!",
text: "Student time log updated!",
timer: 1000,
type: "success",
showConfirmButton: false

});
$('form#time_log').each(function() {
this.reset();

});
$('#_time_log_cs_id').val('');
CS_table.ajax.reload();

});
});
});

});

$('#suspension_log_btn').click(function(e){
e.preventDefault();
$.ajax({
type : "GET",
url : "/sanctions/suspended_students/update",
data : $('form#suspension_log').serialize(),

}).fail(function(data){
var errors = $.parseJSON(data.responseText);
var msg="";

$.each(errors.errors, function(k, v) {
msg = msg + v + "\n";
swal("Oops...", msg, "warning");

});

}).done(function(data) {

swal({
title: "Are you sure?",
text: "Addition of new log cannot be undone",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Submit",
closeOnConfirm: true
}, function(){
$.ajax({
headers : {
'X-CSRF-Token' : $('input[name="_token"]').val()
},
type : "POST",
url : "/sanctions/suspended_students/update",
data : $('form#suspension_log').serialize(),
}).done(function(data){
swal({
title: "Success!",
text: "Suspension log successfully updated!",
timer: 1000,
type: "success",
showConfirmButton: false

});
$('form#suspension_log').each(function() {
this.reset();

});
suspensions_table.ajax.reaload();

$('#_time_log_cs_id').val('');
CS_table.ajax.reload();

});
});
});

});
</script>
@endsection

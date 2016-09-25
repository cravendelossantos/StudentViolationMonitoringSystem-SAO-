@extends('layouts.master')

@section('title', 'SAO | Report Violation')

@section('header-page')
<div class="col-md-12">
	<h1>Report a Violation</h1>
</div>

@endsection

@section('content')

<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>F-SAO-028</h5>

				<div class="ibox-tools"></div>

				<div class="ibox-content">

					<form role="form" action="" id="reportViolationForm" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div id="try" style="display:none">
								<div class="sk-spinner sk-spinner-wave">
									<div class="sk-rect1"></div>
									<div class="sk-rect2"></div>
									<div class="sk-rect3"></div>
									<div class="sk-rect4"></div>
									<div class="sk-rect5"></div>
								</div>

							</div>

							<div class="col-md-6">

								<input type="hidden" name="student_number" id="student_number">

								<div class="form-group" >

									<label>Student No.</label>
									<a class="btn btn-white btn-xs" id="new" style="display:none" data-toggle="modal" data-target="#myModal"><i class="fa fa-male"></i> New Record</a>
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Student No." name="student_no" id="student_no" class="form-control" >
										<span class="input-group-btn">
											<button class="btn btn-default" id="find_student" type="button">
												Find
											</button> </span>
									</div>

									<label id="student_number_error" class="error"></label>

								</div>

								<div class="form-group" id="violation_date_picker">

									<label>Date Committed</label>
									<div class="input-group date" id="data_1">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input type="text" id="date_committed" name="date_committed" class="form-control">
									</div>
								</div>

								<section id="student_info" style="">

									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<output name="first_name" id="first_name" placeholder="First Name" style="text-transform: capitalize"></output>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<output	name="last_name" id="last_name" placeholder="Last Name" style="text-transform: capitalize"></output>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Year/Course</label>
											<output name="year_level" id="year_level" placeholder="Year/Course" ></output>
											<!-- <output name="course" id="course"></output> -->
										</div>
									</div>

									<div class="col-md-6">

										<label>Offense Number #</label>

										<output name="committed_offense_number" id="committed_offense_number" placeholder="Offense Number" ></output>
										<input type="hidden" name="offense_number" id="offense_number">
									</div>

								</section>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Offense level</label>
									<select id="offense_level" name="offense_level" class="form-control">
										<option disabled="" selected=""></option>
										<option>Less Serious</option>
										<option>Serious</option>
										<option>Very Serious</option>
									</select>

									<!-- 						<label>Offense level</label>
									<output id="violation_offense_level" style=""></output> -->
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Violation</label>
									<input type="hidden" name="violation_id" id="violation_id">
									<select class="form-control" id="violation_selection" name="violation">
										<option autofocus="" disabled selected >Violation</option>

									</select>
								</div>
								<div class="form-group" style="margin-top:20px;">
									<label>Complainant</label>
									<input type="text" class="form-control" name="complainant" id="complainant" placeholder="Complainant">

								</div>

								<section id="violation_details" style="display">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<output id="violation_description"></output>

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Sanction</label>
											<output id="violation_sanction" name="violation_sanction"></output>
											<input type="hidden" id="sanction"  name="sanction">
											</p>
										</div>
									</div>

								</section>
							</div>
						</div>

						<div class="ibox-footer">
							<button class="btn btn-w-m btn-primary" id="report_btn" type="submit">
								<strong>Submit</strong>
							</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
</div>

<div class="row">

	<div class="col-md-12 animated fadeInRight">

		<div id="try2" style="display:none">
			<div class="sk-spinner sk-spinner-wave">
				<div class="sk-rect1"></div>
				<div class="sk-rect2"></div>
				<div class="sk-rect3"></div>
				<div class="sk-rect4"></div>
				<div class="sk-rect5"></div>
			</div>

		</div>
		<div class="ibox">
			<div class="ibox float-e-margins">

				<div class="ibox-title">

				</div>

				<div class="ibox-content" id="table-content">
					<div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<table class="table table-striped table-bordered table-hover violation-reports-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
								<thead>

									<th>Date Committed</th>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Offense Number</th>
									<th>Course</th>

								</thead>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">New Student Violation Record</h4>
			</div>

			<form role="form" id="newStudentForm" method="POST">

				{!! csrf_field() !!}

				<div class="ibox-content">

					<div class="form-group">
						<label>Student No.</label>
						<input type="text" placeholder="Student No." class="form-control" id="studentNo" name="studentNo">
					</div>

					<div class="form-group">
						<label>First Name</label>
						<input type="text" placeholder="First Name" class="form-control" id="firstName" name="firstName" style="text-transform: capitalize">
					</div>

					<div class="form-group">
						<label>Last Name</label>
						<input type="text" placeholder="Last Name" class="form-control" id="lastName" name="lastName" style="text-transform: capitalize">
					</div>

					<div class="form-group">
						<label>Year</label>
						<select name="yearLevel" id="yearLevel" class="form-control">
							<option value="1">1st Year</option>
							<option value="2">2nd Year</option>
							<option value="3">3rd Year</option>
							<option value="4">4th Year</option>
							<option value="5">5th Year</option>
						</select>
					</div>

					<div class="form-group">
						<label>Course</label>
						<select class="form-control" id="course" name="course">
							<option autofocus="" disabled selected >Select course</option>
							@foreach ($courses as $course)
							<option >{{$course->description}}</option>
							@endforeach

						</select>
					</div>

					<div class="form-group">
						<label>Contact No.</label>
						<input type="text" placeholder="Contact No.	" class="form-control" id="contactNo" name="contactNo">
					</div>

					<div class="modal-footer">
						<button class="btn btn-w-m btn-primary" type="button" id="new_student_btn">
							<strong>Save</strong>
						</button>
						<button type="button" class="btn btn-w-m btn-danger" id="cancelBtn" data-dismiss="modal">
							<strong>Cancel</strong>
						</button>
					</div>

			</form>
		</div>
	</div>
</div>

<script type="text/javascript"></script>

<style>
	.sk-spinner-wave.sk-spinner {
		margin: 0 auto;
		width: 50px;
		height: 30px;
		text-align: center;
		font-size: 10px;
		position: fixed;
		z-index: 999;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
	}

	#try {
		width: auto;
		height: auto;
		position: fixed;
		z-index: 999;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		background-color: #f3f3f4;
	}
	#try2 {
		width: auto;
		height: auto;
		position: fixed;
		z-index: 999;
		overflow: show;
		margin: auto;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		background-color: #f3f3f4;
	}
</style>

@endsection

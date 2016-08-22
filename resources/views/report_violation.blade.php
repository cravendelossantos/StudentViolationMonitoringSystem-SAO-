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
				<h5>Violation Form</h5>
				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="reportViolationForm" method="POST">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Student No.</label>
								<input type="text" placeholder="Student No." name="studentNo" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Year Level</label>
								<select class="form-control" name="yearLevel">
									<option autofocus="" disabled selected >Year Level</option>
									<option>1st Year</option>
									<option>2nd Year</option>
									<option>3rd Year</option>
									<option>4th Year</option>
									<option>5th Year</option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" placeholder="First Name" style="text-transform: capitalize;" name="firstName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Last Name" style="text-transform: capitalize;" name="lastName" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Violation</label>
								<select class="form-control" name="violationSelection">
									<option autofocus="" disabled selected >Violation</option>
									@foreach ($violations as $violations_row)
									<option>{{$violations_row->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Course</label>
								<select class="form-control" name="course">
									<option autofocus="" disabled selected >Select Course</option>
									@foreach ($courses as $row)
									<option>{{$row->course}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!--
						<div class="col-md-6">
						<div class="form-group" id="data_1">
						<label>Date</label>
						<div class="input-group date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" class="form-control" name="date" placeholder="Pick Date" >
						</div>
						</div>
						</div>-->

					</div>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="addItemBtn" type="submit">
					<strong>Save</strong>
				</button>
				</form>
			</div>

		</div>

		<div class="ibox">
			<div class="ibox float-e-margins">

				<div class="ibox-title">
					<h5>List</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
						<a class="close-link"> <i class="fa fa-times"></i> </a>
					</div>
				</div>

				<div class="ibox-content">

					<div class="table-responsive">

						<table class="table table-striped table-bordered table-hover dataTables-example dataTable">
							<thead>
								<tr>
									<th>Student No.</th>
									<th>Name</th>
									<th>Violation</th>
									<th>Year / Course</th>
									<th>Date Committed</th>

								</tr>
							</thead>
							<tbody  id="tbody">
								@foreach ($studentsViolationTable as $row)
								<tr >
									<td>{{$row->student_no}}</td>
									<td>{{$row->last_name}}, {{$row->first_name}}</td>
									<td>{{$row->violation}}</td>
									<td>{{$row->year_level}}
									<br>
									{{$row->course}}</td>
									<td>{{$row->date_created}}</td>

								</tr>
								@endforeach
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection


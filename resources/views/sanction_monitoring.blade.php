@extends('layouts.master')

@section('title', 'SAO | Sanction Monitoring')

@section('header-page')
<div class="row col-md-12">
	<h1>Sanction Monitoring</h1>
</div>

@endsection


@section('content')

<div class="row">

		<div class="col-md-12 animated fadeInRight">
			<div class="ibox float-e-margins">

		{!! csrf_field() !!}
			<!-- 	<div class="ibox-content">

					<form role="form">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group ">
									<label> Enter Student No.</label>
									<input type="text" placeholder="Student No." name="student_no" id="student_no" class="form-control" autofocus="" aria-required="true">
								</div>
							</div>

				
					
					</form>
				</div>

				<div class="ibox-footer">
					<button class="btn btn-w-m btn-primary" id="s_find_btn" type="button">
						<strong>Find</strong>
					</button>

				</div> -->

			</div>
		</div>
		
<!-- 		
			<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Student information</h5>
				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="addItemForm" method="POST">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-6">

							<div class="form-group ">
								<label>Student No.</label>
								<input type="text" placeholder="Student No." name="student_id" id="student_id" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Violation</label>
									<input type="text" placeholder="Company" name="" class="form-control" name="">
								<select class="form-control" name="violationSelection">
									<option autofocus="" disabled selected >Violation</option>
									<option>Cheating</option>
									<option>Elmar Gaming</option>

								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" placeholder="First Name" name="firstName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Last Name" name="lastName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Year Level</label>
								<input type="text" placeholder="Year Level" name="yearLevel" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Course</label>
								<input type="text" placeholder="Course" name="course" class="form-control">
							</div>
						</div>


					</div>
				</form>

			</div>
			
			
			
			
			


		</div>
 -->	

<div class="ibox">
				<div class="ibox float-e-margins">

					<div class="ibox-title">
						<h5>List</h5>
						<div class="ibox-tools">
						<!-- 	<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
							<a class="close-link"> <i class="fa fa-times"></i> </a> -->
						</div>
					</div>

					<div class="ibox-content">

										<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover sanctions-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
							<thead>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Sanction</th>
								

				
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
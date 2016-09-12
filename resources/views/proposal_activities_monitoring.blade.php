@extends('layouts.master')

@section('title', 'SAO | List of proposal activities')

@section('header-page')
<div class="col-lg-10">
	<h1>List of proposal activities</h1>
</div>

@endsection


@section('content')
<div class="row">
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Update Proposal</h4>
			</div>

			<div class="ibox-content">

				<form role="form" id="UpdateActvity" method="POST" action="/ActivityDetails">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Organization</label>
								<input type="text" placeholder="Name of Organization" name="organizationName" id="organizationName" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label>
								<input type="text" placeholder="Title of Activity" name="title" id="title" class="form-control">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group" id="data_1">
								<label>Date of Activity</label>
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control" name="date" id="date"placeholder="Pick Date" >
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Submitted Documentation</label>
								
                                    <div class="col-sm-10">
                                     
                                        <div class="radio i-checks"><label> <input type="radio" disabled="" value="1" name="status" id ="status"> <i>Done&nbsp &nbsp &nbsp</i> </label>    
                                        <label> <input type="radio" disabled="" checked=""  value="0" name="status" id="status"> <i> To be Submitted</i></label></div>
                                    
                                    </div>
                                

							</div>
						</div>

					</div>

			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" type="button">
					<strong>Save</strong>
				</button>
				<button type="button" class="btn btn-w-m btn-danger"
				data-dismiss="modal">
					<strong>Cancel</strong>
				<input type="hidden" value="{{Session::token()}}" name="_token">
				</form>
				</button>
			</div>
		</div>

	</div>
</div>

	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">

				<h5>Items List</h5>

				<div class="ibox-tools">

					<div class="input-group col-lg-offset-8 col-lg-4">

						<input type="text" class="form-control" id="searchBox" name="searchBox" placeholder="Search for something">
						<span class="input-group-btn">
							<button type="button" id="" class="btn btn-primary searchBtn">
								Go!
						</span>
						</button>
					</div>

				</div>

			</div>

			<div class="ibox-content" id="table-content">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover lost-and-found-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
								<tr>
									<th>Organization</th>
									<th>Title of Activity</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="activities">
								@foreach ($activitiesTable as $row)
								<tr >
									<td>{{$row->organization}}</td>
									<td>{{$row->activity}}</td>
									<td >{{$row->date}}</td>
									@if ($row->status == '0')
									<td style="color:red" >Not Submitted</td>
									@elseif ($row->status == '1')
									<td style="color:green">Submitted</td>
									@endif
									<td> <button class="ladda-button btn btn-s-m btn-primary" type="button" id="{{$row->id}}">
											<strong>Edit</strong>
										</button>
											<button type="button" class="btn btn-s-m btn-danger"
												data-dismiss="modal">
											<strong>Delete</strong>
										</button>
									</td>


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


<script>

		// $(document).ready(function() {
		// 	$('#{{$row->id}}').click(function() {
  //       		var row = $(this).each;

  //       		$('#myModal #organizationName').val(row.organization);
  //         		$('#myModal #title').val(row.activity);
  //         		$('#myModal #date').val(row.date);
  //         		$('#myModal #status').val(row.status);
  //       		$('#myModal').modal('show');
  // 			  });
		// });

		$(document).ready(function(){
 
		 $("#{{$row->id}}").click(function(e){
 		e.preventDefault();
 		$.ajax({
 		headers : {
 				'X-CSRF-Token' : $('input[name="_token"]').val()
 			},
 			url: "/ActivityDetails",
 			type: "GET",
 			data: {
 				id : {{$row->id}}		
 				},
 		}).done(function(data){

 
		 	var msg = "";
 			if (data.success == false) {
 				$.each(data.errors, function(k, v) {
 					msg = msg + v + "\n";
 					swal("Oops...", msg, "warning");
 
 				});
 
 			} else {
 
 				var organization = data.response['organization'];
 				var activity = data.response['activity'];
 				var date = data.response['date'];
 				var status = data.response['status'];
 				
 
 				$('#organizationName').val(organization);
 				$('#title').val(activity);
 				$('#date').val(date);
 				$('#status').val(status);	
 
 			}
 
 });
 
 	$('#myModal').modal("show");
 
 });
 
 });















	$('button#lost_and_found_reportBtn').click(function(e) {

		e.preventDefault();

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/postAddActivity",
			data : $('form#AddActvity').serialize(),

		}).done(function(data) {

			var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			} else if (data.success == true) {

				$('form#AddActvity').each(function() {
					this.reset();
				});
				$("#table-content").fadeTo("slow", 0.3);

				swal('Success!', 'Added Proposal', 'success');

	

			}
		});

	});



	$('button#lost_and_found_cancelBtn').click(function() {
		$('form#AddActvity').each(function() {
			this.reset();
		});
	}); 
</script>	

@endsection


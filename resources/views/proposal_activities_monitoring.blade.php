@extends('layouts.master')

@section('title', 'SAO | List of proposal activities')

@section('header-page')
<div class="col-lg-10">
	<h1>List of proposal activities</h1>
</div>

@endsection


@section('content')
<div class="row">
<div id="activities_modal" class="modal fade" role="dialog">
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
								<output " placeholder="Name of Organization" name="organizationName" id="organizationName" class="form-control" autofocus="" aria-required="true"></output>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label>
								<output placeholder="Title of Activity" name="title" id="title" class="form-control"></output>
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

				<h5>Activities</h5>

				<div class="ibox-tools">

			

				</div>

			</div>

			<div class="ibox-content" id="table-content">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover activities-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
								<tr>
									<th>Organization</th>
									<th>Title of Activity</th>
									<th>Date</th>
									<th>Status</th>
							<!-- 		<th>Action</th> -->
								</tr>
							</thead>
						
						</table>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<script>

		// $(document).ready(function() {
		// 	$('#').click(function() {
  //       		var row = $(this).each;

  //       		$('#myModal #organizationName').val(row.organization);
  //         		$('#myModal #title').val(row.activity);
  //         		$('#myModal #date').val(row.date);
  //         		$('#myModal #status').val(row.status);
  //       		$('#myModal').modal('show');
  // 			  });
		// });

	// 	$(document).ready(function(){
 
	// 	 $("#").click(function(e){
 // 		e.preventDefault();
 // 		$.ajax({
 // 		headers : {
 // 				'X-CSRF-Token' : $('input[name="_token"]').val()
 // 			},
 // 			url: "/ActivityDetails",
 // 			type: "GET",
 // 			data: {
 // 				id : id	
 // 				},
 // 		}).done(function(data){

 
	// 	 	var msg = "";
 // 			if (data.success == false) {
 // 				$.each(data.errors, function(k, v) {
 // 					msg = msg + v + "\n";
 // 					swal("Oops...", msg, "warning");
 
 // 				});
 
 // 			} else {
 
 // 				var organization = data.response['organization'];
 // 				var activity = data.response['activity'];
 // 				var date = data.response['date'];
 // 				var status = data.response['status'];
 				
 
 // 				$('#organizationName').val(organization);
 // 				$('#title').val(activity);
 // 				$('#date').val(date);
 // 				$('#status').val(status);	
 
 // 			}
 
 // });
 
 // 	$('#myModal').modal("show");
 
 // });
 
 // });






//
var activities_table = $('.activities-DT').DataTable({
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/activities/list",
		type: "POST",
			},
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [
		{data : 'organization'},
		{data : 'activity'},
		{data : 'date'},
		{data : 'status'},
		
	]
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







	//Get item details to Modal
	$('.activities-DT').on('click', 'tr', function(){
		var tr_id = $(this).attr('id');
		
		$('form#UpdateActvity')[0].reset();
				$.ajax({
	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
	url: "/activities/activity_details",
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
				var organization = data.response['organization'];
				var title = data.response['activity'];

				$('#organizationName').val(organization);
				$('#title').val(title);

				$('#activities_modal').modal('show');
				
			}
			}

});
	});
</script>	

@endsection


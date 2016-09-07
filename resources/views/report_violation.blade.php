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

				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>

				<div class="ibox-content">

					<form role="form" action="{{ url('/report-violation/report') }}" id="reportViolationForm" method="POST">
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

								<div class="form-group">
									
									<label>Student No.</label>	
									<a class="btn btn-white btn-xs" id="new" style="display:none" data-toggle="modal" data-target="#myModal"><i class="fa fa-male"></i> New Record</a>
									<input type="hidden" name="student_number" id="student_number">
									<input type="text" placeholder="Student No." name="student_no" id="student_no" class="form-control" >
								
									<label id="student_number_error" class="error"></label>
								</div>

									
								<section id="student_info" style="">

									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<output name="first_name" id="first_name" placeholder="First Name" ></output>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>							
											<output	name="last_name" id="last_name" placeholder="Last Name"></output>
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
									<label>Violation</label>
									<input type="hidden" name="violation_id" id="violation_id">
									<select class="form-control" id="violation_selection" name="violation">
										<option autofocus="" disabled selected >Violation</option>
										@foreach ($violations as $violation)
										<option >{{$violation->name}}</option>
										@endforeach
								
									</select>
								</div>
								<br>

								<section id="violation_details" style="display">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<output id="violation_description">
											</output>
										
										</div>
									</div>


									<div class="col-md-6">
										<div class="form-group">
											<label>Offense level</label>
											<output id="violation_offense_level" style=""></output>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Sanction</label>
											<output id="violation_sanction"></output>
											</p>
										</div>
									</div>

								</section>
							</div>
						</div>

						<div class="ibox-footer">
							<button class="btn btn-w-m btn-primary" id="report_btn" type="button">
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
					<h5>List</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
						<a class="close-link"> <i class="fa fa-times"></i> </a>
					</div>
				</div>

				<div class="ibox-content" id="table-content">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover violation-reports-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
							<thead>
								<tr>
									<th>Date Committed</th>
									<th>Student No.</th>
									<th>Name</th>
									<th>Violation</th>
									<th>Offense Number</th>
									<th>Year / Course</th>
								

								</tr>
							</thead>

							<tbody>

								@foreach ($violation_reports as $violation_report)

								<tr >
									<td>{{$violation_report->created_at}}</td>
									<td>{{$violation_report->student_id}}</td>
									<td>{{$violation_report->first_name}} {{$violation_report->last_name}}</td>
									<td>{{$violation_report->violation_name}}</td>
									<td>{{$violation_report->offense_no}}</td>
									<td>{{$violation_report->year_level}}
					
				

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
											<input type="text" placeholder="First Name" class="form-control" id="firstName" name="firstName">
										</div>

										<div class="form-group">
											<label>Last Name</label>
											<input type="text" placeholder="Last Name" class="form-control" id="lastName" name="lastName">
										</div>
									
										<div class="form-group">
											<label>Year</label>
											<select name="yearLevel" id="yearLevel">
												<option>1st Year</option>
												<option>2nd Year</option>
												<option>3rd Year</option>
												<option>4th Year</option>
												<option>5th Year</option>
											</select>
										</div>

										<div class="form-group">
											<label>Course</label>
											<input type="text" placeholder="Course" class="form-control" id="course" name="course">
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

<script type="text/javascript">

$(document).ready(function(){
$('#report_btn').prop('disabled', true);
});

function x(){
	$('#try').show();
setTimeout(function(){

        $('#try').fadeOut('slow');
    },700);
}



function y(){
	$('#try2').show();
setTimeout(function(){

        $('#try2').fadeOut('slow');
    },3000);
}



$('button#report_btn').click(function(e){
	e.preventDefault();

	$.ajax({
		headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/report-violation/report",
			data : $('form#reportViolationForm').serialize(),
			}).done(function(data){
		
			var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});


			} else {
			
				swal({   
					title: "Are you sure?",   
					text: "You will not be able to change or delete this record",   
					type: "warning",   
					showCancelButton: true,  
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Save",   
				    closeOnConfirm: false 
				}, function(){  
			 swal({   
			 	title: "Success!",  
			 	 text: "Violation Reported",   
			 	 timer: 1000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});
			   		    		y();
				$("#table-content").load("/violation-reports/table/load").fadeTo("slow", 1);
				
						$('form#reportViolationForm').each(function() {
					this.reset();
				});	
						$('#offense_number').val("");
						$('#committed_offense_number').val("");
						$('#offense_level').val("");
						$('#student_number').val("");
						$('#violation_id').val("");


				$('#last_name').val("").attr("readonly",false);
				$('#first_name').val("").attr("readonly",false);
				
				$('#year_level').val("").attr("readonly",false);


			   		});




			

			

			}
	});
});



$('#student_no').keydown(function() {
	
		var search = $('#student_no').autocomplete({

		source : '{!!URL::route('autocompleteStudentNo')!!}',
		minlength: 3,
		autoFocus: true,
		delay: 100,

		select:function(e, ui) {

		search.on('change', function(){


			$('#last_name').val("").attr("readonly",false);
			$('#first_name').val("").attr("readonly",false);
			$('#year_level').val("").attr("readonly",false);
			$('#student_number').val("").attr("readonly",false);
			$('#committed_offense_number').val("");
		});
			

			$('#student_number').val(ui.item.value);
			$('#last_name').val(ui.item.l_name);
			$('#first_name').val(ui.item.f_name);
			//$('#course').val(ui.item.course);
			$('#year_level').val(ui.item.year_level + "/" + ui.item.course);
			countOffense();
			
		},
		 focus: function( e, ui ) {


			$('#student_number').val(ui.item.value);
			$('#last_name').val(ui.item.l_name);
			$('#first_name').val(ui.item.f_name);
			//$('#course').val(ui.item.course);
			$('#year_level').val(ui.item.year_level + "/" + ui.item.course);

		 }
		

	});

		$('#report_btn').prop('disabled', false);

			});
		




	$('#student_no').on('blur change', function(e){
			e.preventDefault();


			var stud_no = $('#student_no').val();

			//checks if textbox has input
			if (stud_no.length <= 0){

			$('#student_number').val("");
			$('#last_name').val("").attr("readonly",false);
			$('#first_name').val("").attr("readonly",false);
			$('#year_level').val("").attr("readonly",false);
			$('#report_btn').prop('disabled', true);
			$('#violation_description').val("");
			$('#violation_sanction').val("");
			$('#violation_offense_level').val("");	

			} else {		
				$.ajax({
					url : '{!!URL::route('autocompleteStudentNo')!!}',
					type : 'GET',
					data : {
						term : stud_no 
					},
				}).done(function(data) {

					//checks if data reponse has value
					if (data.length == 0)
					{
						x();
						$('#violation_description').val("");
						$('#violation_sanction').val("");
						$('#violation_offense_level').val("");	
						$('#new').show();
						$('#student_number_error').html("Student not found");
						$('#offense_number').val("").attr("readonly",false);
						$('#committed_offense_number').val("");
						$('#offense_level').val("").attr("readonly",false);
						$('#student_number').val("");
						$('#violation_id').val("").attr("readonly",false);

						$('#last_name').val("").attr("readonly",false);
						$('#first_name').val("").attr("readonly",false);
						$('#year_level').val("").attr("readonly",false);
					}
					else{
					x();
					$('#new').hide();
					$('#student_number_error').html("");
					var value = data[0].value;
					var f_name = data[0].f_name;
					var l_name = data[0].l_name;
					var year_level = data[0].year_level;
					var course = data[0].course;
				$('#student_number').val(value);
				$('#last_name').val(l_name).attr("readonly",true);
				$('#first_name').val(f_name).attr("readonly",true);
				//$('#course').val(ui.item.course);
				$('#year_level').val(year_level + "/" + course).attr("readonly",true);
				countOffense();
			}

			});

				$('#report_btn').prop('disabled', false);
					}
				
});




$('#new').click(function(){
//load a modal and add record and put into inputs
var student_no = $('#student_no').val();
$('#studentNo').val(student_no);

$('#student_no').val("");
});



$('#new_student_btn').click(function(e){
	e.preventDefault();
	
	$.ajax({
		url : '/report-violation/add-student',
		type: 'POST',
		data: $('form#newStudentForm').serialize(),
	}).done(function(data){
		var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			} else {
				x();
			 swal({   
			 	title: "Success!",  
			 	 text: "Student Added",   
			 	 timer: 3000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});

			 		$('form#newStudentForm').each(function() {
					this.reset();
				});	
			   

			    $('#myModal').modal('toggle');
			   	$('#new').hide();
				$('#student_number_error').html("");
			}
	});

	var student_no = $('#studentNo').val();
	var first_name = $('#firstName').val();
	var last_name = $('#lastName').val();
	var year_level = $('#yearLevel').val();
	var course = $('#course').val();
	var contact = $('#contactNo').val();

	$('#student_number').val(student_no);
	$('#student_no').val(student_no);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#year_level').val(year_level + "/" + course);
	$('#contact').val(contact);
	


	//ajax
})











	$('#violation_selection').on('change select', function(e) {
		e.preventDefault();

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url : '/report-violation/search/violation',
			type : 'GET',
			data : {
				violation : $('#violation_selection').val()
			},
		}).done(function(data) {
			x();
			var violation_id = data.response['id'];
			var violation_offense_level = data.response['offense_level'];
			var violation_description = data.response['description'];
			var violation_sanction = data.response['sanction'];


	
			if (data == null) {
				alert('Not Found');
			} else {

				$('#violation_id').val(violation_id);
				$('#violation_offense_level').val(violation_offense_level);
				$('#violation_description').val(violation_description);
				$('#violation_sanction').val(violation_sanction);
				//$('#violation_details').show();
				countOffense();
			
	
			}

		});

	});


function countOffense()
{
		$.ajax({
					headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
				},
					url : '/report-violation/offense-no',
					type: 'POST',
					data : $('form#reportViolationForm').serialize(),
				}).done(function(data){


				var offense_no = data.response;
				if (offense_no != null)	{
					offense_no += 1;
					if (offense_no > 3 && offense_no <=6 && $('#violation_offense_level').val('Less Serious'))
					{
						$('#violation_offense_level').attr("style", "color:orange").val('Serious');
						
					}
					else if (offense_no >6 && $('#violation_offense_level').val('Serious'))
					{
						$('#violation_offense_level').attr("style", "color:red").val('Very Serious');
	
					}
				$('#committed_offense_number').val(offense_no);	
				$('#offense_number').val(offense_no);	
				} else {
				$('#violation_offense_level').attr("style", "color:#cccc00")
				$('#committed_offense_number').val(1);
				$('#offense_number').val(1);
				}

				//alert(	$('#committed_offense_number').val());
			
				});
			}
</script>

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

#try{
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
#try2{
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
	background-color:#f3f3f4;
} 
</style>

@endsection

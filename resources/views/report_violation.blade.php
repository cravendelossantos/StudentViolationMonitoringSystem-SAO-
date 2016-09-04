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

							<div class="col-md-6">

								<div class="form-group">
									<label>Student No.</label>
									<input type="hidden" name="student_number" id="student_number">
									<input type="text" placeholder="Student No." name="student_no" id="student_no" class="form-control" autofocus="" >
								</div>
								<section id="student_info" style="display:none">

									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<output name="first_name" id="first_name"></output>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<output name="last_name" id=last_name></output>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Year/Course</label>
											<output name="year_level" id="year_level"></output>
											<output name="course" id="course"></output>
										</div>
									</div>

									<div class="col-md-6">

										<label>Offense Number #</label>
										<output name="committed_offense_number" id="committed_offense_number"></output>
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

								<section id="violation_details" style="display:none">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
											<output id="violation_description">
												<p></p>
											</output>
											</p>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Offense level</label>
											<output id="violation_offense_level" style="color:red"></output>
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
								<strong>Add</strong>
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
									<th>Offense Number</th>
									<th>Year / Course</th>
									<th>Date Committed</th>

								</tr>
							</thead>

							<tbody>

								@foreach ($violation_reports as $violation_report)

								<tr >
									<td>{{$violation_report->student_id}}</td>
									<td>{{$violation_report->first_name}} {{$violation_report->last_name}}</td>
									<td>{{$violation_report->violation_name}}</td>
									<td>{{$violation_report->offense_no}}</td>
									<td>{{$violation_report->year_level}}
					
									<td>{{$violation_report->created_at}}</td>

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

<script type="text/javascript">

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
				$('#violation_details').hide();
				$('#student_info').hide();
				$('form#reportViolationForm').each(function() {
					this.reset();
				});
				/*$("#table-content").fadeTo("slow", 0.3);
*/
				swal('Success!', 'Saved', 'success');

			

			}
	});
});



	$('#student_no').keydown(function() {
		
		var search = $('#student_no').autocomplete({

		source : '{!!URL::route('autocompleteStudentNo')!!}',
		minlength: 3,
		autoFocus: true,

		
		select:function(e, ui) {
		search.on('change', function(){

			$('#student_info').hide();
			$('#last_name').val("");
			$('#first_name').val("");
			$('#year_level').val("");
			$('#student_number').val("");
		});
			

			$('#student_info').show();
			$('#student_number').val(ui.item.value);
			$('#last_name').val(ui.item.l_name);
			$('#first_name').val(ui.item.f_name);
			//$('#course').val(ui.item.course);
			$('#year_level').val(ui.item.year_level + "/" + ui.item.course);
			countOffense();
			
		}
	
		
	});  



});

	$('#violation_selection').on('change', function(e) {
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
				$('#violation_details').show();
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
					

				$('#committed_offense_number').val(offense_no);	
				$('#offense_number').val(offense_no);	
				} else {

				$('#committed_offense_number').val(1);
				$('#offense_number').val(1);
				}

				//alert(	$('#committed_offense_number').val());
			
				});
			}
</script>

@endsection

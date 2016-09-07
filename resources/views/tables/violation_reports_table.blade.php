
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

					
<script src="/js/app.js"></script>
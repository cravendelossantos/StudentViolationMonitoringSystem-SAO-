@extends('layouts.master')

@section('title', 'SAO | Violation Reports')

@section('header-page')
<div class="row">
<div class="col-md-12">
	<h1>Violation Reports</h1>
</div>
</div>
@endsection









@section('content')





<div class="row">
<div class="col-md-12">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					{{ csrf_field() }}

		<div class="ibox float-e-margins">
		<div class="ibox-content">
		<div class="row">
<div class="col-md-6">
	<div class="form-group" id="v_reports_range">
                                <output name="v_reports_range">Select date range:</output>

                                <div class="input-daterange input-group" id="datepicker">

                                <span class="input-group-addon">From</span>
                                    <input type="text" class="input-sm form-control" id="v_reports_from" name="v_reports_from" value="">

                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control"  id="v_reports_to" name="v_reports_to" value="">

                                </div>
           
                                <br>
                           <button type="button" class="btn btn-w-m btn-primary" id="show_v_reports">Show</button>
                            </div>
   </div>

<div class="col-md-4">
  <output name="v_reports_range">Offense level:</output>
   <select class="form-control" name="v_reports_offense_level" id="v_reports_offense_level">
                                	<option value="">All</option>
                                	<option value="Less Serious">Less Serious Offenses</option>
                                	<option value="Serious">Serious Offenses</option>
                                	<option value="Very Serious">Very Serious Offenses</option>
                                </select>

</div>
       </div>

      	<div class="hr-line-solid"></div>

	<div class="table-responsive">



					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover violation-reports-reports-DT DataTable" id="violation-reports-DT" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
									<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Course</th>
									<th>Complainant</th>
                   					<th>Date Reported</th>
                    				<th>Offense</th>
                   					<th>Offense No</th>
                    				<th>Description</th>	
									</tr>
						
							</thead>

							

						</table>

					</div>
				</div>
							</div>
									</div>

	</div>
	</div>



<script type="text/javascript">

 $('#show_v_reports').click(function (e){
	e.preventDefault();

	if ($('#v_reports_from').val() == ""  || $('#v_reports_to').val() == ""){
		swal("Ooops!", "Please the select dates range", "warning");
	}
	else{
		getReports();
	}
 });
/*
 $('#v_reports_offense_level').change(function(e){
 	e.preventDefault();
getReports();
 })*/


function getReports(){
$('.violation-reports-reports-DT').DataTable().destroy();
var v_reports_table = $('.violation-reports-reports-DT').DataTable({
"bPaginate" : false,
	"bInfo" :false,
	"bSort" : false,
	"bFilter" : false,
  "ajax": {
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
      url : "/violation-reports/reports",
    type: "POST",
       data: function (d) {
                d.v_reports_from = $('#v_reports_from').val();
                d.v_reports_to = $('#v_reports_to').val();
                d.v_reports_offense_level = $('#v_reports_offense_level').val();
            },


},
"columns" : [
	{data : 'first_name'},
	{data : 'last_name'},
	{data : 'course'},
	{data : 'complainant'},
	{data : 'date_reported'},
	{data : 'name'},
	{data : 'offense_no'},
	{data : 'description'},
	
  ],

  dom : '<"html5buttons"B>Tgtip',
  buttons : [{
    extend : 'csv',
    title : 'Violation Reports',
  }, {
    extend :'excel',
    title : 'Violation Reports',
  } , {
    extend : 'pdf',
    title : 'Violation Reports',
  } , {
    extend : 'print',
    title : 'Violation Reports',
    customize : function(win) {
      $(win.document.body).addClass('white-bg');
      $(win.document.body).css('font-size', '8px').prepend('<label></label>');
      $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
    }
  }]

});

}

  $('#v_reports_range .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
format: 'yyyy-mm-dd',
            });



</script>

@endsection
@extends('layouts.master')

@section('title', 'SAO | Locker Reports')

@section('header-page')
<div class="row">
	<div class="col-md-12">
		<h1>Locker Reports and Statistics</h1>

		<div class="form-group" id="locker_reports_range">
			<output name="LAF_stats_range">Select date range:</output>

			<div class="input-daterange input-group" id="datepicker">

				<span class="input-group-addon">From</span>
				<input type="text" class="input-sm form-control" id="locker_reports_from" name="locker_reports_from" value="">

				<span class="input-group-addon">to</span>
				<input type="text" class="input-sm form-control"  id="locker_reports_to" name="locker_reports_to" value="">

			</div>
			<br>
			<button type="button" class="btn btn-w-m btn-primary" id="show_locker_reports">Show</button>
		</div>
	</div>
</div>

@endsection


@section('content')



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

	<div class="col-md-12">


		<div class="ibox-content">
			<div class="row">
				<button class="btn btn-outline btn-info  dim" id="print" type="button"><i class="fa fa-print"></i> </button>
				<div class="col-sm-12 text-center">
					<h1>Locker Reports and Statistics</h1>


				</div>

			</div>






			<div class="row">
				<div class="col-md-6 text-left" id="report_ranges">

					<output id="report_from"></output>         
					<output id="report_to"></output>      

				</div>
			</div>


			<br><br>

			<div  id="report_content">


				{!! csrf_field() !!}
				<input type="hidden" name="_token" value="{{ csrf_token() }}">






				<div class="row">
					<div class="col-md-12">

						<div class="flot-chart">
							<div class="flot-chart-pie-content" id="flot-pie-chart"></div>
						</div>

					</div>
				</div>





				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<center><div class="table-responsive">



							<!-- <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"> -->



							<table class="table table-striped table-bordered table-hover locker-reports-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid">

								<thead>
									<tr>
										<th>No. of Lockers</th>
										<th>Available</th>
										<th>Occupied</th>
										<th>Damaged</th>
										<th>Locked</th>
										<!--    <th>TOTAL NO OF LOST AND FOUND ITEMS</th> -->
									</tr>

								</thead>



							</table>
<!-- 
</div> -->
</div></center>
</div>
</div>


<div class="row" style="bottom: -10; margin-left: 10px;">
	<label class="text-center" >Prepared by:</label> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->roles->first()->name }} , Student Affairs Office)
</div>
<br>
<br>
<div class="row"   style="bottom: -10; margin-left: 10px;">
	<label class="text-center">Noted by:</label> Ms. Lourdes C. Reyes (Head, Student Affairs Office) 
</div>

</div>        </div>
</div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>


$('#print').click(function(e){

    html2canvas($("#flot-pie-chart"), {
      onrendered: function(canvas) {
        var img = canvas.toDataURL("image/jpg");  
        var pdf = new jsPDF("p", "pt", "letter");
        pdf.setProperties({
          title: 'Locker Reports and Statistics',
          subject: '',     
          keywords: 'generated',
          creator: '{{ Auth::user()->first_name }}'
        });


        var content = document.getElementById('report_content').innerHTML;


        

        var body = document.body.innerHTML =  "<h1 style='text-align: center;'>Locker Reports and Statistics</h1><br><br><center><img src=" + img + " class='img-responsive'><br><br>" + content + "</center>";
        window.print();
        window.location.reload();
      }
    });


});


	$('#show_locker_reports').click(function(e){

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url : "/locker-reports/stats",
			type: 'POST',
			data: function (d) {
				d.locker_reports_from = $('#locker_reports_from').val();
				d.locker_reports_to = $('#locker_reports_to').val();
			},
			async: false,
			success: function(response){
				items = response;

				console.log(items);
			}
		});

		var data = [{
			label: "TOTAL",
			data: items['total'],
			color: "#d3d3d3",
		}, {
			label: "AVAILABLE",
			data: items['available'],
			color: "#54cdb4",
		}, {
			label: "OCCUPIED",
			data: items['occupied'],
			color: "#00b33c",
		}, {
			label: "LOCKED",
			data: items['locked'],
			color: "#e6e600",
		},{
			label: "DAMAGED",
			data: items['damaged'],
			color: "#e60000",
		}
		];


		function labelFormatter(label, series) {
			return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>"    + label + "<br/>" + series.data[0][1] + "%</div>";
		}


		var plotObj = $.plot($("#flot-pie-chart"), data, {
			series: {
				pie: {
					show: true,
					radius: 1,
					label: {
						show: true,
						radius: 2 / 3,
						formatter: function (label, series) {
							return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';

						},
						threshold: 0.1
					}
				}
			},
			legend: {
				show: false
			},

			grid: {
				hoverable: true
			},
			tooltip: true,
			tooltipOpts: {
        	 //percentage content: "%y.0, %s", // show value to 0 decimals
        	 content: function(label,x,y){
        	 	return y+" item/s "+ "(" + label + ")";
        	 },
        	 shifts: {
        	 	x: 20,
        	 	y: 0
        	 },
        	 defaultTheme: false
        	}
        });



		$('.locker-reports-DT').DataTable().destroy();
		$('.locker-reports-DT').DataTable({
			"bPaginate" : false,
			"bInfo" :false,
			"bSort" : false,
			"bFilter" : false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},
				url : "/locker-reports/list",
				type: "POST",
				data: function (d) {
					d.locker_reports_from = $('#locker_reports_from').val();
					d.locker_reports_to = $('#locker_reports_to').val();
				},
			},
			"columns" : [
			{data: 'total'},
			{data: 'occupied'},
			{data: 'available'},	
			{data: 'damaged'},
			{data: 'locked'},
			],


		});
	});
	
	$('#locker_reports_range .input-daterange').datepicker({
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true,
		format: 'yyyy-mm-dd',
	});


</script>
@endsection
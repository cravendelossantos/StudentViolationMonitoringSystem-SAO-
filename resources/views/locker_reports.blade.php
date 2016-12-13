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

<div class="ibox float-e-margins">
	<div class="ibox-title">

		<h5><b>Locker Report and Statistics</b></h5>


		<button type="button" class="btn btn-primary btn-xs m-l-sm pull-right" id="print">Print</button>
		<button id="save" class="btn btn-primary  btn-xs m-l-sm pull-right" onclick="save()" type="button">Save</button>
		<button id="edit" class="btn btn-primary btn-xs m-l-sm pull-right" onclick="edit()" type="button">Edit</button>
<!--                             <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>

                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>



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

                    	<div  id="report_content">
                    		<div class="col-md-12">
                    			<div class="click2edit">
                    				<div class="ibox float-e-margins">
                    					<div class="ibox-content">
<!-- 			<div class="row">
				<button class="btn btn-outline btn-info  dim" id="print" type="button"><i class="fa fa-print"></i> </button>
				<div class="col-sm-12 text-center">
					<h1>Locker Reports and Statistics</h1>


				</div>

			</div> -->


			<div class="row">
				<div class="col-sm-12 text-center">
					<img src="/img/officialseal1.png"  class="pic1">

				</div>
			</div>
			<div class="row">

				<br><br>
				<div class="col-sm-12 text-center">
					<h5>Student Affair's Office</h5>
					<h5>Locker Availability</h5>


				</div>


				<br>
			</div>





			<div class="row">
				<div class="form-group col-xs-6 text-left" id="report_ranges">

					<output id="report_from"></output>         
					<output id="report_to"></output>      

				</div>

				<div class="form-group col-xs-6 text-right">   
					<output id="date"></output>  
				</div>
			</div>


			<br><br>



			{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">





			<div id="visualization" class="" style="width: 900px; height: 400px; display: block; margin: auto;"></div>
				<!-- <div class="row">
					<div class="col-md-12">

						<div class="flot-chart">
							<div class="flot-chart-pie-content" id="flot-pie-chart"></div>
						</div>

					</div>
				</div>
			-->




			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<center><div class="table-responsive">



						<!-- <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"> -->



						<table class="table table-striped table-bordered table-hover locker-reports-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid" style="width: 100%;">

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
	<label class="text-center" >Prepared by:</label><br><br> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br> {{ Auth::user()->roles->first()->name }} , Student Affairs Office
</div>
<br>
<div class="row"   style="bottom: -10; margin-left: 10px;">
	<label class="text-center">Noted by:</label><br><br> Ms. Lourdes C. Reyes <br>Head, Student Affairs Office 
</div>

</div>        </div>
</div>
</div>
</div>
</div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>


	$('#print').click(function(e){

		$(this).hide();
		var content = document.getElementById('report_content').innerHTML;

		document.body.innerHTML = content;
		window.location.reload();

		/* $('.google-visualization-controls-rangefilter').hide();*/
		window.print();


	});


	$('#show_locker_reports').click(function(e){

    if ($('#locker_reports_from').val() != ""  || $('#locker_reports_to').val() != ""){
    // swal("Ooops!", "Please the select dates range", "warning");
    $('#report_from').val("From: " + $('#locker_reports_from').val());
    $('#report_to').val("To: " + $('#locker_reports_to').val());
  }




		drawVisualization();
		function drawVisualization() {
			var options = {

				legend : {
					position: 'right',
				},
				backgroundColor: { fill:'transparent' },
				/*title: 'Total number of Lost and Found items',*/
				is3D: false,
				pieHole: 0.4,
				pieSliceText: 'percentage',
				slices: {
					0: { color: 'green'},
					1: { color: 'blue', offset: 0.2},
					2: { color: 'gold', offset: 0.1},
					3: { color: 'red', offset: 0.3},
				}

			};
			$.ajax({
				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},
				url : "/locker-reports/stats",
				type: 'POST',
				data:  {
					locker_reports_from : $('#locker_reports_from').val(),
					locker_reports_to : $('#locker_reports_to').val()
				},
				async: false,
			}).fail(function(data){
				var errors = $.parseJSON(data.responseText);
				var msg="";
				
				$.each(errors.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");
				});

			}).done(function(response){
				items = response;

				console.log(items);
				var items = response;

				var c_data = google.visualization.arrayToDataTable([

					['Statistics',   'Lockers'],
					['Available',   items.available],
					['Occupied',   items.occupied],
					['Locked',   items.locked],
					['Damaged',   items.damaged]
					]);

				var LAF_chart = new google.visualization.PieChart(document.getElementById('visualization'));
				LAF_chart.draw(c_data, options);

			});





			google.setOnLoadCallback(drawVisualization);



		}
		/*var data = [{
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
        });*/



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
        	{data: 'available'},
        	{data: 'occupied'},	
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

<script src="js/inspinia.js"></script>

<!-- SUMMERNOTE -->
<script src="js/plugins/summernote/summernote.min.js"></script>


<script>


	$(document).ready(function(){

//  $('#report_type').val("List of "+$('select#v_reports_offense_level').val() + " Reservations");

//     $('select#school_year').change(function(e){   
//     $('.activities-DT').DataTable().ajax.url('/activities/ActivitiesByYear').load();
//     $('#schoolyear').val("S.Y."+ $('select#school_year').val());
//     $('#report_from').val("");
//     $('#report_to').val("");
//     $('#v_reports_from').val("");
//     $('#v_reports_to').val("");
//     $('#report_type').val("");
//     $('#v_reports_offense_level').val("");


// });


//         $('select#v_reports_offense_level').change(function(e){   
//             $('#report_type').val("List of "+$('select#v_reports_offense_level').val() + " Reservations");


// });


var date = new Date();
var options = {year: "numeric", month: "long", day: "numeric"};
var newdate = date.toLocaleDateString('en-US', options);
$('#date').val(newdate);
$('#schoolyear').val("S.Y." + $('#school_year').val());



$('.summernote').summernote();


});
	var edit = function() {
		$('.click2edit').summernote({focus: true});

	};
	var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>


    <style type = "text/css">


    	.note-codable {
    		display:none;
    	}
    	.note-help {
    		display:none;
    	}
    	.note-insert {
    		display:none;
    	}
    	.note-view {
    		display:none;
    	}


    	.note-toolbar {
    		/*background-color: white;*/
/*position: absolute;
    bottom: 330px;
    right: 200px;*/
    /*padding-left: 30px;*/
    padding-bottom: 30px;
    /*border-bottom:1px solid #a9a9a9*/
}








</style>

@endsection
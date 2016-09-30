@extends('layouts.master')

@section('title', 'SAO | Home')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>

@endsection


@section('content')
<div class="row">
	<div class="col-lg-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h4>Violation Statistics</h4>
			</div>
			<div class="ibox-content">

				<div class="flot-chart">
					<div class="flot-chart-content" id="flot-bar-chart"></div>
				</div>

			</div>

			<!-- <div class="ibox-footer">

			</div> -->
		</div>
	</div>


	<!-- <div class="col-lg-6 animated fadeInRight">
			<div class="ibox float-e-margins">
 <div class="ibox-title">
                            <h4>Lost and Found Statistics</h4>
                          
                        </div>
                        <div class="ibox-content">
                            <div class="flot-chart">
                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                            </div>
                        </div>

</div>
</div> -->

</div>







<script src="/js/demo/app-flot.js"></script>
		<script src="/js/demo/flot-demo2.js"></script>






<script>
	
	//Flot Pie Chart
$(document).ready(function() {
$.ajax({
  headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
       	url : "/lost-and-found/reports/stats",
   type: 'POST',
   data: 'type=fetch',
   async: false,
   success: function(response){
     items = response;

     console.log (json_events);
    
   }
});

    var data = [{
        label: "UNCLAIMED",
        data: items['unclaimed'],
        color: "#d3d3d3",
    }, {
        label: "CLAIMED",
        data: items['claimed'],
        color: "#54cdb4",
    }, {
        label: "DONATED",
        data: items['donated'],
        color: "#1ab394",
    }, /*{
        label: "TOTAL",
        data: 52,
        color: "#1ab394",
    }*/];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
        	 //percentage content: "%y.0, %s", // show value to 0 decimals
            content: function(label,x,y){
    return y+" Items "+ "(" + label + ")";
},
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});
</script>


@endsection





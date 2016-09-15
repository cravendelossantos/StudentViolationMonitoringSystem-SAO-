@extends('layouts.master')

@section('title', 'SAO | Lost and Found Statistics')

@section('header-page')
<div class="row">
<div class="col-md-12">
  <span class="pie">0.52,1.041</span> 
  <h1></h1>
</div>
</div>
@endsection


@section('content')
<div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5> Statistics</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="flot-chart">
                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                    </div>


   <input type="hidden" name="_token" value="{{ csrf_token() }}">

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

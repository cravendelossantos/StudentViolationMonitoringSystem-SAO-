@extends('layouts.master')

@section('title', 'SAO | Lost and Found Reports')

@section('header-page')
<div class="row">
<div class="col-md-12">
	<h1>Lost and Found Reports and Statistics</h1>
</div>
</div>

@endsection


@section('content')

<div class="animated fadeInLeft">
	<div id="try" style="display:none">
									<div class="sk-spinner sk-spinner-wave">
                                    <div class="sk-rect1"></div>
                                    <div class="sk-rect2"></div>
                                    <div class="sk-rect3"></div>
                                    <div class="sk-rect4"></div>
                                    <div class="sk-rect5"></div>
                                </div>

                                </div>

		<div class="ibox float-e-margins">
<div class="ibox-title">
<label>Generate Reports</label>

</div>

		<div class="ibox float-e-margins">
<div class="ibox-content">

{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">



<div class="row col-md-12">

			
<div class="form-group" id="data_4">
                                <label>Select month</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="month" name="month" class="form-control">
                                </div>
                            </div>
          </div>


<div class="row">
<div class="col-md">
<div class="ibox-content">
  <div class="flot-chart">
                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                            </div>
    </div>
    </div>
    </div>






<div class="row ">
<div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">



					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover lost-and-found-reports-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
									<tr>
									<th>CLAIMED</th>
									<th>UNCLAIMED</th>
										<th>DONATED</th>
										<th>TOTAL NO OF LOST AND FOUND ITEMS</th>
									</tr>
						
							</thead>

							

						</table>

					</div>
				</div>
							</div>
									</div>

<!-- <div class="ibox-footer">
</div>
 -->
				</div>
				</div>
    </div>			

<script type="text/javascript">
  function LAF_currentMonthReports() {

var d = new Date(),

    n = d.getMonth(),

    y = d.getFullYear();

var current_date = n + y;

$.ajax({
  headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
        url : "/lost-and-found/reports/stats",
   type: 'POST',
    data : {month : current_date},
   async: false,
   success: function(response){
     items = response;

    
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


    $('.lost-and-found-reports-DT').DataTable({

  "ajax": {
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
      url : "/lost-and-found/reports/list",
    type: "POST",
    data : {month : current_date},
},
"columns" : [
{data: 'claimed'},
{data: 'unclaimed'},
{data: 'donated'},
{data: 'total'},
  ],

  dom : '<"html5buttons"B>Tgtip',
  buttons : [{
    extend : 'csv',
    title : 'LOST AND FOUND ITEMS',
  }, {
    extend :'excel',
    title : 'LOST AND FOUND ITEMS',
  } , {
    extend : 'pdf',
    title : 'Lost and Found Reports',
  } , {
    extend : 'print',
    title : 'LOST AND FOUND ITEMS',
    customize : function(win) {
      $(win.document.body).addClass('white-bg');
      $(win.document.body).css('font-size', '8px').prepend('<label>Text</label>');
      $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
    }
  }]
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

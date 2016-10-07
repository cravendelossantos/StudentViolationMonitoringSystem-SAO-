@extends('layouts.master')

@section('title', 'SAO | Violation Statistics')

@section('header-page')
<div class="col-md-12">
	<h1>Violation Statistics</h1>
</div>

@endsection
		<script src="/js/demo/app-flot.js"></script>
		<script src="/js/demo/flot-demo2.js"></script>

@section('content')

<div class="row">
	<div class="col-lg-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					{{ csrf_field() }}
				<div class="">


						<div class="form-group" id="v_stats_range">
                                <output name="v_stats_range">Select date range:</output>

                                <div class="input-daterange input-group" id="datepicker">

                                <span class="input-group-addon">From</span>
                                    <input type="text" class="input-sm form-control" id="v_stats_from" name="v_stats_from" value="">

                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control"  id="v_stats_to" name="v_stats_to" value="">

                                </div>
                                <br>
                           <button type="button" class="btn btn-w-m btn-primary" id="show_v_stats">Show</button>
                            </div>

				</div>
				<div class="hr-line-solid"></div>
			</div>

			<div class="ibox-content">

				<div class="flot-chart">
					<div class="flot-chart-content" id="flot-bar-chart"></div>
				</div>

			</div>

			<div class="ibox-footer">

			</div>
		</div>
	</div>
</div>



<div class="row ">
<div class="col-md-12">
<div class="ibox-content">
	<div class="table-responsive">



					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover violation-stats-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
							
								<th>CAMS</th>
									<th>CAS</th>
										<th>CBA</th>
										<th>COECSA</th>
                    <th>CITHM</th>								
						
							</thead>

							

						</table>

					</div>
					</div>
				</div>
							</div>
									</div>




<script src="/js/demo/app-flot.js"></script>
<script src="/js/demo/flot-demo2.js"></script>
<script type="text/javascript">
	


   var v_stats_table = $('.violation-stats-DT').DataTable({

  "ajax": {
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
      url : "/violation-statistics/stats",
    type: "POST",
    data: function (d) {
                d.v_stats_from = $('#v_stats_from').val();
                d.v_stats_to = $('#v_stats_to').val();
            },
    // data : {month : current_date},
},
"columns" : [
	{data : 'cams'},
	{data : 'cas'},
	{data : 'cba'},
	{data : 'coecsa'},
	{data : 'cithm'},
	
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




  $('#v_stats_range .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
format: 'yyyy-mm-dd',
            });

 $('#show_v_stats').click(function (e){
	
v_stats_table.ajax.reload();
getData();
 });







function getData()
{

    
    var barOptions = {
        series: {
            bars: {
                show: true,
                barWidth: 0.6,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.8
                    }, {
                        opacity: 0.8
                    }]
                }
            }
        },
        xaxis: {
            /*tickDecimals: 0.,*/
            ticks: [[1,"CAMS"],[2,"CAS"],[3,"CBA"],[4,"COECSA"],[5,"CITHM"]]
        },
        yaxis : {
            tickSize: 1
        },
        colors: ["#1ab394"],
        grid: {
            color: "#999999",
            hoverable: true,
            clickable: true,
            tickColor: "#D4D4D4",
            borderWidth:0
        },
        legend: {
            show: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "x: %x, y: %y"
        }
    };
    $.ajax({
        headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
        url: '/violation-statistics/stats',
        type:'POST',
        dataType: "json",
        data: {
               v_stats_from : $('#v_stats_from').val(),
                v_stats_to : $('#v_stats_to').val(),
            },
    }).done(function(data){
        console.log(data.stats);
        var data = data.stats;

    $.plot($("#flot-bar-chart"), [data], barOptions);

   });
}


</script>
@endsection


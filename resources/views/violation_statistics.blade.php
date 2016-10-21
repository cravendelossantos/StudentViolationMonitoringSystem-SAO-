@extends('layouts.master')

@section('title', 'SAO | Violation Statistics')

@section('header-page')
<div class="row">
<div class="col-md-12">
	<h1>Violation Statistics</h1>

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
</div>
</div>
@endsection


@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="row">
                   <button class="btn btn-outline btn-info  dim" id="print" type="button"><i class="fa fa-print"></i> </button>
                   <div class="col-sm-12 text-center">
                    <h1>Violation Statistics</h1>


                </div>

            </div>


                  <div class="row">
          <div class="col-md-6 text-left" id="report_ranges">
       
          <output id="report_from"></output>         
          <output id="report_to"></output>      
           
            </div>
            </div>


            <div class="flot-chart" style="display: block;">
                <div class="flot-chart-content" id="flot-bar-chart"></div>
            </div>

            <br><br>

      <div  id="report_content">
<div class="row">
    
           <div class="col-md-12">

            <center><div class="table-responsive">



<!--                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"> -->



                    <table class="table table-striped table-bordered table-hover violation-stats-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid" style="width: 70%;">

                        <thead>

                            <th>CAMS</th>
                            <th>CAS</th>
                            <th>CBA</th>
                            <th>COECSA</th>
                            <th>CITHM</th>                              

                        </thead>



                    </table>
<!--       </div> -->
                </div></center>
            </div>
            </div>


            <br><br><br>
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

</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="js/demo/app-flot.js"></script>
<!-- <script src="/js/demo/flot-demo2.js"></script> -->
<script type="text/javascript">
	
/*    $('#print').click(function(e){
        $(this).hide();
        var content = document.getElementById('report_content').innerHTML;
        document.body.innerHTML = content;

        window.print();
//document.location.href = "/violation-statistics"; 


e.preventDefault();
});

*/


$('#print').click(function (){
    html2canvas($("#flot-bar-chart"), {
    onrendered: function(canvas) {
    var img = canvas.toDataURL("image/jpg");  
    var pdf = new jsPDF("l", "pt", "letter");
    pdf.setProperties({
    title: 'Violation Statistics',
    subject: '',     
    keywords: 'generated',
    creator: '{{ Auth::user()->first_name }}'
});

var date_ranges = document.getElementById('report_ranges').innerHTML;
var content = document.getElementById('report_content').innerHTML;


var body = document.body.innerHTML =  "<h1 style='text-align: center;'>Violation Statistics</h1><br>" + date_ranges + "<br><br><center><img src=" + img + "><br><br>" + content + "</center>";
window.print();
document.location.href = "/violation-statistics"; 
    /*pdf.setFontSize(22);
    pdf.text(30, 50, 'Violation Statistics');
    pdf.addImage(img, 'JPEG',  18, 80);
 
    pdf.output('datauri');
    */            }
          });

});




    var v_stats_table = $('.violation-stats-DT').DataTable({
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


});




    $('#v_stats_range .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: 'yyyy-mm-dd',
    });

    $('#show_v_stats').click(function (e){

        $('#report_from').val("From: " + $('#v_stats_from').val());
        $('#report_to').val("To: " + $('#v_stats_to').val());

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


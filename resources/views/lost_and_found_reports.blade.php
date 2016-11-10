@extends('layouts.master')

@section('title', 'SAO | Lost and Found Reports')

@section('header-page')
<div class="row">
  <div class="col-md-12">
   <h1>Lost and Found Reports and Statistics</h1>

   <div class="form-group" id="LAF_stats_range">
    <output name="LAF_stats_range">Select date range:</output>

    <div class="input-daterange input-group" id="datepicker">

      <span class="input-group-addon">From</span>
      <input type="text" class="input-sm form-control" id="LAF_stats_from" name="LAF_stats_from" value="">

      <span class="input-group-addon">to</span>
      <input type="text" class="input-sm form-control"  id="LAF_stats_to" name="LAF_stats_to" value="">

    </div>
    <br>
    <button type="button" class="btn btn-w-m btn-primary" id="show_LAF_stats">Show</button>
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
        <h1>Lost and Founds Reports and Statistics</h1>


      </div>

    </div>






    <div class="row">
      <div class="col-md-6 text-left" id="report_ranges">

        <output id="report_from"></output>         
        <output id="report_to"></output>      

      </div>
    </div>


    <br><br>

    <div id="report_content">


      {!! csrf_field() !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      
      <div id="chart-div"></div>

      @piechart('IMDB', 'chart-div')
     <!--  <div class="row">
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


<!-- 

<div class="animated fadeInLeft">

		<div class="ibox float-e-margins">
<div class="ibox-title">
<label>Generate Reports</label>

</div>

</div>			 -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script type="text/javascript">

  $('#print').click(function(e){
    var content = document.getElementById('report_content').innerHTML;
        // $(this).hide();
        $('.google-visualization-controls-rangefilter').hide();
        window.print();
      });


 /* $('#print').click(function (){
    html2canvas($("#flot-pie-chart"), {
      onrendered: function(canvas) {
        var img = canvas.toDataURL("image/jpg");  
        var pdf = new jsPDF("p", "pt", "letter");
        pdf.setProperties({
          title: 'Lost and Found Reports and Statistics',
          subject: '',     
          keywords: 'generated',
          creator: '{{ Auth::user()->first_name }}'
        });


        var content = document.getElementById('report_content').innerHTML;


        

        var body = document.body.innerHTML =  "<h1 style='text-align: center;'>Lost and Found Reports and Statistics</h1><br><br><center><img src=" + img + " class='img-responsive'><br><br>" + content + "</center>";
        window.print();
        window.location.reload();
      }
    });

  });*/



  $('#LAF_stats_range .input-daterange').datepicker({
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: 'yyyy-mm-dd',
  });

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
      data : {LAF_stats_from : $('#LAF_stats_from').val(),
      LAF_stats_to : $('#LAF_stats_to').val(),
    },
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
            show: true,
            radius: 1,
            label: {
              show: true,
              radius: 2/3,
              formatter: labelFormatter,
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

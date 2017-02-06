@extends('layouts.master')

@section('title', 'SAO | Violation Statistics')

@section('header-page')
<div class="row">
  <div class="col-md-12">
   <h1>Violation Statistics</h1>

   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   {{ csrf_field() }}
   <div class="col-md-6">


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

  <div class="col-md-4">
    <div class="form-group">

      <label>School Year</label>
      <select name="school_year" id="school_year" class="form-control">
        @foreach ($schoolyear as $schoolyear)
        <option>{{$schoolyear->school_year }}</option>
        @endforeach

        @foreach ($schoolyears as $schoolyear)
        <option>{{$schoolyear->school_year }}</option>
        @endforeach

      </select> 
    </div>
  </div>




</div>
</div>
@endsection


@section('content')
<!-- <button class="btn btn-outline btn-info  dim" id="print" type="button"><i class="fa fa-print"></i> </button> -->

<div class="ibox float-e-margins">
  <div class="ibox-title">

    <h5><b>Violation Statistics</b></h5>


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
                              <div class="col-md-12">
                              <div class="click2edit">
                              <div id="report_content">    
                                <div class="ibox float-e-margins">
                                  <div class="ibox-content">
                                    <div class="row">
                                      <div class="col-sm-12 text-center">
                                        <img src="/img/officialseal1.png"  class="pic1">

                                      </div>
                                    </div>
                                    <div class="row">

                                      <br><br>
                                      <div class="col-sm-12 text-center">
                                        <h5>Student Affair's Office</h5>
                                        <h5>Violation Statistics</h5>


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
                                       <output id="schoolyear"></output>  
                                     </div>
                                   </div>


            <!-- <div class="flot-chart" style="display: block;">
                <div class="flot-chart-content" id="flot-bar-chart"></div>
              </div> -->

              <br><br>


              <div class="row">

               <div class="col-md-12">
                 <div id="visualization" class="" style="width: 900px; height: 400px; display: block; margin: auto;"></div>
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
$('#print').click(function(e){
 $(this).hide();
 var content = document.getElementById('report_content').innerHTML;

 document.body.innerHTML = content;
 window.location.reload();

 /* $('.google-visualization-controls-rangefilter').hide();*/
 window.print();
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
      d.school_year = $('#school_year').val();
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


$('#schoolyear').val("S.Y." + $('#school_year').val());

$('#v_stats_range .input-daterange').datepicker({
  keyboardNavigation: false,
  forceParse: false,
  autoclose: true,
  format: 'yyyy-mm-dd',
});

$('#show_v_stats').click(function (e){


if($('#v_stats_from').val() == ""  && $('#v_stats_to').val() == "")
{
  $('#report_from').val("");
  $('#report_to').val("");
}
else 
{
  $('#report_from').val("From: " + $('#v_stats_from').val());
  $('#report_to').val("To: " + $('#v_stats_to').val());
}
  v_stats_table.ajax.reload();
        // getData();

        drawVisualization();
        function drawVisualization() {
          var options = {

            is3D: true,

            bar: {
              groupWidth: "90%"
            },
            legend: { 
              position: "none" 
            },
            backgroundColor: { fill:'transparent' },
            hAxis : {title:'Colleges', titleTextStyle:{color:'red'}},
            vAxis : {title:'Students'},

          };


          $.ajax({
            headers : {
              'X-CSRF-Token' : $('input[name="_token"]').val()
            },
            url: '/violation-statistics/stats',
            type:'POST',
            
            data: {
             v_stats_from : $('#v_stats_from').val(),
             v_stats_to : $('#v_stats_to').val(),
             school_year : $('#school_year').val(),

           },
         }).done(function(response){
          var items = (response.data);


          var c_data = new google.visualization.DataTable();
          c_data.addColumn('string', 'Department');
          c_data.addColumn({type:'string', role:'annotation'});
          c_data.addColumn('number', 'Number of Students');
          c_data.addRows([['College of Allied Medicine', 'CAMS', items[0].cams],
            ['College of Arts', 'CAS', items[0].cas],
            ['College of Engineering, Computer Studies and Architecture', 'COECSA', items[0].coecsa],
            ['College of International we', 'CITHM', items[0].cithm],
            ['College of Business Administration', 'CBA', items[0].cba],
            ]);

        /*var c_data = google.visualization.arrayToDataTable([
         
            ['Statistics',   'Violations'],
            ['CAMS',   items[0].cams],
            ['CAS',   items[0].cas],
            ['CBA',   items[0].cba],
            ['COECSA',   items[0].coecsa],
            ['CITHM',   items[0].cithm]
            ]);*/

            var LAF_chart = new google.visualization.ColumnChart(document.getElementById('visualization'));
            LAF_chart.draw(c_data, options);


          });




         google.setOnLoadCallback(drawVisualization);
       }

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


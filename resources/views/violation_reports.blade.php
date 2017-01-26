@extends('layouts.master')

@section('title', 'SAO | Violation Reports')

@section('header-page')
<div class="row">
  <div class="col-md-12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ csrf_field() }}


    <div class="row">
      <div class="col-md-4">
        <div class="form-group" id="v_reports_range">
          <output name="v_reports_range">Select date range:</output>

          <div class="input-daterange input-group" id="datepicker">

            <span class="input-group-addon">From</span>
            <input type="text" class="input-sm form-control" id="v_reports_from" name="v_reports_from" value="">

            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control"  id="v_reports_to" name="v_reports_to" value="">

          </div>

          <br>
          <br>
          <button type="button" class="btn btn-w-m btn-primary" id="show_v_reports">Show</button>
        </div>
      </div>

      <div class="col-md-2">
        <output name="v_reports_range">Offense level:</output>
        <select class="form-control" name="v_reports_offense_level" id="v_reports_offense_level">
          <option value="">All</option>
          <option value="Less Serious">Less Serious Offenses</option>
          <option value="Serious">Serious Offenses</option>
          <option value="Very Serious">Very Serious Offenses</option>
        </select>

          <output name="v_reports_range">College:</output>
            <select class="form-control" id="college" name="college">
              <option autofocus="" disabled selected value="">Select course</option>
              @foreach ($colleges as $college)
              <option value="{{ $college->id }}">{{$college->description}}</option>
              @endforeach

            </select>

      </div>

             <div class="col-md-2">
              <output name="v_reports_range">Course</output>
            <select class="form-control" id="course" name="course">
              <option autofocus="" disabled selected value="">Select course</option>
              @foreach ($courses as $course)
              <option value="{{ $course->description }}" >{{$course->description}}</option>
              @endforeach

            </select>




            <div class="form-group">

                <output name="v_reports_range">School Year:</output>
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
</div>

@endsection









@section('content')

<div class="ibox float-e-margins">
  <div class="ibox-title">

    <h5><b>Violation Reports</b></h5>


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


<div class="row" id="report_content">
  <div class="col-lg-12">


<div class="click2edit">
    <div class="ibox float-e-margins">
      <div class="ibox-content p-xl">

      <div class="row">
        <div class="col-sm-12 text-center">
          <img src="/img/officialseal1.png"  class="pic1">

        </div>
      </div>
      <div class="row">

        <br><br>
        <div class="col-sm-12 text-center">
          <h5>Student Affair's Office</h5>
          <h5>Violation Reports</h5>


        </div>


        <br>
      </div>




         <div class="row">
          <div class="form-group col-xs-6 text-left">
       
          <output id="report_from"></output>         
          <output id="report_to"></output>      
           
            </div>
        <div class="form-group col-xs-6 text-right">   
          <output id="date"></output>  
        </div>




            </div>
            <div class="row">


              <div class="col-sm-12 text-center">
                <output id="report_type"></output>

              </div>
            </div>


        
        <div class="row">

          <div class="col-md-12">
            <div class="table-responsive">


<!-- 
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

 -->
            <br>
            <table class="table table-striped table-bordered table-hover violation-reports-reports-DT DataTable" id="violation-reports-reports-DT" aria-describedby="DataTables_Table_0_info" role="grid" style="width: 100%;">

              <thead>
                <tr>
                  <th>Name</th>
<!--                   <th>Last Name</th> -->
                  <th>Course</th>
<!--                   <th>Complainant</th> -->
                  <th>Date Reported</th>
                  <th>Offense</th>
                  <th>Offense No</th>
                  <th>Description</th>  
                </tr>

              </thead>



            </table>

        <!--   </div> -->
        </div>
        </div>
        <br><br>
   <!--      <table class="table invoice-total">
          <tbody>
            <tr>
              <td><strong>Sub Total :</strong></td>
              <td>$1026.00</td>
            </tr>
            <tr>
              <td><strong>TAX :</strong></td>
              <td>$235.98</td>
            </tr>
            <tr>
              <td><strong>TOTAL :</strong></td>
              <td>$1261.98</td>
            </tr>
          </tbody>
        </table> -->
   <!--      <div class="text-right">
          <button class="btn btn-primary"><i class="fa fa-dollar"></i> Make A Payment</button>
        </div> -->

    <!--     <div class="well m-t"><strong>Comments</strong>
          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
        </div> -->

<div class="row" style="bottom: -10; margin-left: 10px;">
  <label class="text-center" >Prepared by:</label><br><br> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br> {{ Auth::user()->roles->first()->name }} , Student Affairs Office
</div>
<br>
<div class="row"   style="bottom: -10; margin-left: 10px;">
  <label class="text-center">Noted by:</label><br><br> Ms. Lourdes C. Reyes <br>Head, Student Affairs Office 
</div>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">


$('#show_v_reports').click(function (e){
e.preventDefault();


$('#report_from').val("From: " + $('#v_reports_from').val());
$('#report_to').val("To: " + $('#v_reports_to').val());
$('#report_type').val("List of "+$('select#v_reports_offense_level').val() + " Offenses");

if ($('#v_reports_from').val() == ""  || $('#v_reports_to').val() == ""){
	swal("Ooops!", "Please the select dates range", "warning");
}
else{
	getReports();
}


});

$('#course').change(function (e){
e.preventDefault();

alert($('#course').val());


});

$('#college').change(function (e){
e.preventDefault();

alert($('#course').val());


});


$('#print').click(function(e){
$(this).hide();
var content = document.getElementById('report_content').innerHTML;
document.body.innerHTML = content;

window.print();
window.location.reload();


e.preventDefault();
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
  "processing": true,
    "serverSide": true,
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
              d.v_reports_college = $('#college').val();
              d.v_reports_course = $('#course').val();

          },


},
"columns" : [
{data : 'name'},

{data : 'course'},
// {data : 'complainant'},
{data : 'date_reported'},
{data : 'name'},
{data : 'offense_no'},
{data : 'description'},

],


});

}

$('#v_reports_range .input-daterange').datepicker({
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
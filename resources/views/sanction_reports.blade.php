@extends('layouts.master')

@section('title', 'SAO | Violation Reports')

@section('header-page')
<div class="row">
  <div class="col-md-12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ csrf_field() }}


    <div class="row">
      <div class="col-md-2">
        <div class="form-group" id="v_reports_range">
<!--           <output name="v_reports_range">Select date range:</output>

          <div class="input-daterange input-group" id="datepicker">

            <span class="input-group-addon">From</span>
            <input type="text" class="input-sm form-control" id="v_reports_from" name="v_reports_from" value="">

            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control"  id="v_reports_to" name="v_reports_to" value="">

          </div>

          <br>
          <br>
          <button type="button" class="btn btn-w-m btn-primary" id="show_v_reports">Show</button> -->

                              <label>Enter Student Number</label>

                    <div class="input-group">


                      <input type="text" id="sanction_student_no" name="sanction_student_no" class="form-control"> <span class="input-group-btn"> <button type="button" id="sanction_find_student" class="btn btn-primary">Find
                    </button> </span></div>

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

      </div>

             <div class="col-md-2">


            <div class="form-group">

                <output name="v_reports_range">School Year:</output>
                <select name="school_year" id="school_year" class="form-control">
                  @foreach ($schoolyear as $schoolyear)
                  <option>{{$schoolyear->school_year }}</option>
                  @endforeach

<!--                   @foreach ($schoolyears as $schoolyear)
                  <option>{{$schoolyear->school_year }}</option>
                  @endforeach -->
                  
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
          <h5>Student Violation Reports</h5>


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
          <output id="schoolyear"></output>  
        </div>




            </div>
            <div class="row">


              <div class="col-sm-12 text-center">
                <output id="report_type"></output>
                <output id="report_group"></output>

              </div>
            </div>


        
        <div class="row">

          <div class="col-md-12">
            <div class="table-responsive">


<!-- 
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

 -->
            <br>
            <table class="table table-striped table-bordered table-hover sanctions-DT1 dataTable" id="sanctions-DT1" aria-describedby="DataTables_Table_0_info" role="grid" style="font-size: 10.2px; width: 100%;">
                        <thead>

                          <tr>

                            <th>Date Committed</th>

                            <th>Violation ID</th>
                            <th>Violation Description</th>
                            <th>Offense Level</th>
                            <th>Offense Number</th> 
                            <th>Sanction</th>
                            <th>Status</th>
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


  //Sanction

function getStudentReports(){
  var sanctions_table = $('#sanctions-DT1').DataTable({
    "bPaginate" : false,
    "bInfo" :false,
    "bFilter" : false,
    "processing": true,
    "serverSide": true,
    "ajax": {
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val(),
      },
      url : "/sanctions/search/student",
      type: 'POST',
      data: function (d) {
        d.sanction_student_no = $('input[name=sanction_student_no]').val();
        d.v_reports_offense_level = $('#v_reports_offense_level').val();
        console.log(v_reports_offense_level);
      }
    },

    "bSort" : false,
    "bFilter" : false,
    "bDestroy": true,

    "rowId" : 'rv_id',  
    "columns" : [
    
    {data : 'date_reported'},

    {data : 'rv_id'},
    {data : 'description'},
    {data : 'offense_level'},
    {data : 'offense_no'},
    {data : 'sanction'},
    {data : 'status'},

    ],
  });
}



  $('#sanction_find_student').on('click', function(e) {

alert($('#v_reports_offense_level').val());


    var stud_no = $('#sanction_student_no ').val();
    getStudentReports();

            $.ajax({
          url : '/report-violation/search/student',
          type : 'GET',
          data : {
            term : stud_no
          },
        }).done(function(data){

  
            var f_name = data[0].f_name;
            var l_name = data[0].l_name;
            var year_level = data[0].year_level;
            var course = data[0].course;
            var guardian_name = data[0].guardian_name;
            var guardian_contact_no = data[0].guardian_contact_no;


            $('#report_from').val("Name: "+f_name + " " + l_name).attr("readonly",true);
            $('#report_to').val(course).attr("readonly",true);
            $('#report_type').val("List of Offenses ");

          });
    // $('#report_from').val("Student Number: " + $('#sanction_student_no').val());
    e.preventDefault();
  });





    


 




$('#v_reports_offense_level').change(function (e){
e.preventDefault();

// alert($('#course').val());


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
              d.school_year = $('#school_year').val();

          },


},
"columns" : [

   {data:"first_name",
    "className":"left",
    "render":function(data, type, full, meta){
       return full.first_name + " " + full.last_name;
    }
   },
// {data : 'first_name',},

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


<script src="http://localhost:8000/js/inspinia.js"></script>

<!-- SUMMERNOTE -->
<script src="http://localhost:8000/js/plugins/summernote/summernote.min.js"></script>


<script>


  $(document).ready(function(){




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
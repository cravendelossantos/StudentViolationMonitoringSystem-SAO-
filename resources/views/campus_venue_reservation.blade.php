@extends('layouts.master')

<!DOCTYPE html>
@section('title', 'SAO | Home')

@section('header-page')
<div class="row">
  <div class="col-md-12">
    <h1>Campus Venue Reservation</h1>
  </div>
</div>

@endsection


@section('content')


<!-- <div id="wrapper">

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Event</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>

                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                 <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <label for="title">Venue</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <label for="title">Organizer</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <label for="title">Date</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <label for="title">Day</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                <label for="title">CVF no.</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">    
                                  <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Reservation</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

              </div>

                    
                
                
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Striped Table </h5>
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
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</div> -->

 <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendar</h1>
                <div id="calendar" class="col-centered">
                </div>
            </div>
            
        </div>
        <!-- row -->
        
        <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/campus/add">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Event</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Venue</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Venue">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Organizer</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Organizer">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Choose</option>
                     
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Reserved</option>
                          <option style="color:#000;" value="#000">&#9724; Banned</option>
                          
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Start date</label>
                    <div class="col-sm-10">
                      <input type="text" name="start" class="form-control" id="start" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">End date</label>
                    <div class="col-sm-10">
                      <input type="text" name="end" class="form-control" id="end" readonly>
                    </div>
                  </div>

                    <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Remark Status</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Choose</option>
                     
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Approved</option>
                          <option style="color:#000;" value="#000">&#9724; Disapproved</option>
                          
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">CVF No.</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="CVF No.">
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        
        
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="/campus/update">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Choose</option>
                     
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Reserved</option>
                          <option style="color:#000;" value="#000">&#9724; Banned</option>
                          
                        </select>
                    </div>
                  </div>
       
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
                          </div>
                        </div>
                    </div>
                  
                  <input type="hidden" name="id" class="form-control" id="id">
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>

    </div>

<!-- Mainly scripts -->
<script src="js/plugins/fullcalendar/moment.min.js"></script>


<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script>

    $(document).ready(function() {




            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


$.ajax({
  headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
    url: '/get-events',
   type: 'POST',
   data: 'type=fetch',
   async: false,
   success: function(response){
     json_events = response;

     console.log (json_events);
    
   }
});


        $('#calendar').fullCalendar({
        
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
                
            },

            selectable: true,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectHelper: true,
            events: json_events,  
         

			select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
            eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit').modal('show');
        });
      },
            eventDrop: function(event, delta, revertFunc) { // change of position

        edit(event);

      },

            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // event resize

        edit(event);

      }
            
        });


  

            function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }



    });




</script>

		

 
@endsection



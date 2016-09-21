@extends('layouts.master')


@section('title', 'SAO | Academic Calendar')

@section('header-page')
<div class="row">
  <div class="col-md-12">
    <h1>Academic Calendar</h1>
  </div>
</div>

@endsection


@section('content')




 
        <div class="row animated fadeInDown ">
          <div class="col-lg-12 ">

            <div class="ibox float-e-margins">

            <div class="ibox-content">
            <div class="text-center">
                <h1></h1>
                <div id="calendar" class="col-centered">
                </div>
            </div>
            </div>
        </div>
            </div>  

                </div>
        <!-- row -->
        
    <div class="container">
         <!-- Modal -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" id="addEvent" method="POST" action="/campus/add">
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
                      <input type="text" name="venue" class="form-control" id="venue" placeholder="Venue">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Organizer</label>
                    <div class="col-sm-10">
                      <input type="text" name="organization" class="form-control" id="organization" placeholder="Organizer">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" id="status">
                          <option value="">Choose</option>
                     
                          <option style="color:#FF0000;" value="Reserved">&#9724; Reserved</option>
                          <option style="color:#000;" value="Banned">&#9724; Banned</option>
                          
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
                      <select name="remark_status" class="form-control" id="remark_status">
                          <option value="">Choose</option>
                     
                          <option style="color:#FF0000;" value="Approved">&#9724; Approved</option>
                          <option style="color:#000;" value="#isapproved">&#9724; Disapproved</option>
                          
                        </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">CVF No.</label>
                    <div class="col-sm-10">
                      <input type="text" name="cvf_no" class="form-control" id="cvf_no" placeholder="CVF No.">
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="addEvent_btn" id="addEvent_btn" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
        
        
        <!-- Modal -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" id="updateEvent" method="POST" action="/campus/update">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                <button type="submit" class="btn btn-primary" id="updateEvent_btn">Save changes</button>

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
    url: '/academic-calendar/events',
   type: 'POST',
   data: 'type=fetch',
   async: false,
   success: function(response){
     json_events = response;

     console.log (json_events);
    
   }
});


        var calendar1 = $('#calendar').fullCalendar({
        
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
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD '));
        $('#ModalAdd').modal('show');
      },
            eventRender: function(event, element) {
        element.bind('click', function() {
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

      },

      eventMouseover: function( event, jsEvent, view ) { 
        var start = (event.start.format("HH:mm"));
        var back=event.backgroundColor;
        if(event.end){
            var end = event.end.format("HH:mm");
        }else{var end="No definition";
        }
        if(event.allDay){
            var allDay = "YES";
        }else{var allDay="NO";
        }
        var tooltip = '<div class="tooltip-demo" style="width:230px;height:170px;color:black;background-color:white;'+back+';position:absolute;z-index:10001;">'+'<center>'+ event.title +'</center>'+'Venue: '+event.venue+'<br>'+'Organizer: '+event.organization+'<br>'+'status: '+event.status+'<br>'+'Todo el dia: '+allDay+'<br>'+ 'Start: '+start+'<br>'+ 'End: '+ end  +'<br>'+'Remark Status: '+event.remark_status+'<br>'+'cvf_no: '+event.cvf_no+'<br>'+'</div>';

        $("body").append(tooltip);
        $(this).mouseover(function(e) {
          $(this).css('z-index', 10000);
          $('.tooltip-demo').fadeIn('500');
          $('.tooltip-demo').fadeTo('10', 1.9);
        }).mousemove(function(e) {
          $('.tooltip-demo').css('top', e.pageY + 10);
          $('.tooltip-demo').css('left', e.pageX + 20);
        });            
      },

      eventMouseout: function(calEvent, jsEvent) {
        $(this).css('z-index', 8);
        $('.tooltip-demo').remove();
      },
            
        });


  

            function edit(event){
      start = event.start.format('YYYY-MM-DD HH');
      if(event.end){
        end = event.end.format('YYYY-MM-DD');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = {'id' : id, 'start' : start, 'end' :end};
     /* id = id;
      start = start;
      end = end;*/
      var data =  console.log(JSON.stringify(Event));
    

      $.ajax({
         headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
       url: '/campus/update',
       type: "POST",
       data: {Event: data},
       success: function(data) {
 //calendar1.fullCalendar('updateEvent', Event);
 console.log(Event);
          if(data.response == 'true'){
          
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }





    });


  $('button#addEvent_btn').click(function(e) {

    e.preventDefault();

    $.ajax({
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
      type : "POST",
      url : "/campus/add",
      data : $('form#addEvent').serialize(),

    }).done(function(data) {

      var msg = "";
      if (data.success == false) {
        $.each(data.errors, function(k, v) {
          msg = msg + v + "\n";
          swal("Oops...", msg, "warning");

        });

      } else {

        $('#ModalAdd').modal('hide');
        swal({   
        title: "Success!",  
         text: "Added Event",   
         timer: 2000, 
         type: "success",  
         showConfirmButton: false 
        });
        calendar1.ajax.reload();
         $('#calendar').fullCalendar( 'refetchEvents' );
  

      }
    });






  });


      $('button#updateEvent_btn').click(function(e) {

    e.preventDefault();

    $.ajax({
      headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
      type : "POST",
      url : "/campus/update",
      data : $('form#updateEvent').serialize(),

    }).done(function(data) {

      var msg = "";
      if (data.success == false) {
        $.each(data.errors, function(k, v) {
          msg = msg + v + "\n";
          swal("Oops...", msg, "warning");

        });

      } else {

        $('#ModalEdit').modal('hide');
        swal({   
        title: "Success!",  
         text: "Updated Event",   
         timer: 2000, 
         type: "success",  
         showConfirmButton: false 
        });

        calendar1.ajax.reload();
        $('#calendar').fullCalendar( 'refetchEvents' );
  

      }
    });

 });







</script>

		

 
@endsection



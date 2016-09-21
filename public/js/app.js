$('#data_1 .input-group.date').datepicker({
	todayBtn : "linked",
	keyboardNavigation : false,
	forceParse : false,
	calendarWeeks : true,
	autoclose : true,
	format : 'yyyy-mm-dd'
});


$('#violation_date_picker .input-group.date').datepicker({
	todayBtn : "linked",
	keyboardNavigation : false,
	forceParse : false,
	calendarWeeks : true,
	autoclose : true,
	format : 'yyyy-mm-dd'
});

			
   $('#data_4 .input-group.date').datepicker({
   //   	todayBtn : "linked",
  		format : 'yyyy-mm',
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });


		


//Report violation
var violation_reports_table = $('.violation-reports-DT').DataTable({
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/report-violation/reports",
		type: "POST",
			},
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [
		{data : 'date_reported'},
		{data : 'student_no'},
		{data : 'first_name'},
		{data : 'last_name'},
		{data : 'name'},
		{data : 'offense_no'},
		{data : 'course'},

		
	]
});


$('#report_btn').prop('disabled', true);


function x(){
	$('#try').show();
setTimeout(function(){

        $('#try').fadeOut('slow');
    },700);
}



function y(){
	$('#try2').show();
setTimeout(function(){

        $('#try2').fadeOut('slow');
    },3000);
}



$('button#report_btn').click(function(e){
	e.preventDefault();

	$.ajax({
		headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/report-violation/report",
			data : $('form#reportViolationForm').serialize(),
			}).done(function(data){
		
			var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});


			} else {
			
				swal({   
					title: "Are you sure?",   
					text: "You will not be able to change or delete this record",   
					type: "warning",   
					showCancelButton: true,  
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Save",   
				    closeOnConfirm: false 
				}, function(){  
			 swal({   
			 	title: "Success!",  
			 	 text: "Violation Reported",   
			 	 timer: 1000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});
			   	violation_reports_table.ajax.reload();
				
						$('form#reportViolationForm').each(function() {
					this.reset();
				});	
						$('#offense_number').val("");
						$('#committed_offense_number').val("");
						$('#offense_level').val("");
						$('#student_number').val("");
						$('#violation_id').val("");


				$('#last_name').val("").attr("readonly",false);
				$('#first_name').val("").attr("readonly",false);
				
				$('#year_level').val("").attr("readonly",false);


			   		});




			

			

			}
	});
});


/*
$('#student_no').keydown(function() {
	
		var search = $('#student_no').autocomplete({

		source : '/report-violation/search/student',
		minlength: 3,
		autoFocus: true,
		delay: 100,

		select:function(e, ui) {

		search.on('change', function(){


			$('#last_name').val("").attr("readonly",false);
			$('#first_name').val("").attr("readonly",false);
			$('#year_level').val("").attr("readonly",false);
			$('#student_number').val("").attr("readonly",false);
			$('#committed_offense_number').val("");
		});
			

			$('#student_number').val(ui.item.value);
			$('#last_name').val(ui.item.l_name);
			$('#first_name').val(ui.item.f_name);
			//$('#course').val(ui.item.course);
			$('#year_level').val(ui.item.year_level + "/" + ui.item.course);
			countOffense();
			
		},
		 focus: function( e, ui ) {


			$('#student_number').val(ui.item.value);
			$('#last_name').val(ui.item.l_name);
			$('#first_name').val(ui.item.f_name);
			//$('#course').val(ui.item.course);
			$('#year_level').val(ui.item.year_level + "/" + ui.item.course);

		 }
		

	});

		$('#report_btn').prop('disabled', false);

			});
		
*/



	$('#find_student').on('click', function(e){
			e.preventDefault();
			

			var stud_no = $('#student_no').val();

			//checks if textbox has input
			if (stud_no.length <= 0){

			$('#student_number').val("");
			$('#last_name').val("").attr("readonly",false);
			$('#first_name').val("").attr("readonly",false);
			$('#year_level').val("").attr("readonly",false);
			$('#report_btn').prop('disabled', true);
			$('#violation_description').val("");
			$('#violation_sanction').val("");
			$('#violation_offense_level').val("");	

			} else {		
				$.ajax({
					url : '/report-violation/search/student',
					type : 'GET',
					data : {
						term : stud_no 
					},
				}).done(function(data) {

					//checks if data reponse has value
					if (data.length == 0)
					{
						x();
						$('#violation_selection').val("");
						$('#violation_description').val("");
						$('#violation_sanction').val("");
						$('#violation_offense_level').val("");	
						$('#new').show();
						$('#student_number_error').html("Student not found");
						$('#offense_number').val("").attr("readonly",false);
						$('#committed_offense_number').val("");
						$('#offense_level').val("").attr("readonly",false);
						$('#student_number').val("");
						$('#violation_id').val("").attr("readonly",false);

						$('#last_name').val("").attr("readonly",false);
						$('#first_name').val("").attr("readonly",false);
						$('#year_level').val("").attr("readonly",false);
					}
					else{
					x();
					$('#new').hide();
					$('#student_number_error').html("");
					var value = data[0].value;
					var f_name = data[0].f_name;
					var l_name = data[0].l_name;
					var year_level = data[0].year_level;
					var course = data[0].course;
				$('#student_number').val(value);
				$('#last_name').val(l_name).attr("readonly",true);
				$('#first_name').val(f_name).attr("readonly",true);
				//$('#course').val(ui.item.course);
				$('#year_level').val(year_level + "/" + course).attr("readonly",true);
				//countOffense();
			}

			});

				$('#report_btn').prop('disabled', false);
					}
				
});




$('#new').click(function(){
//load a modal and add record and put into inputs
var student_no = $('#student_no').val();
$('#studentNo').val(student_no);

$('#student_no').val("");
});



$('#new_student_btn').click(function(e){
	e.preventDefault();
	
	$.ajax({
		url : '/report-violation/add-student',
		type: 'POST',
		data: $('form#newStudentForm').serialize(),
	}).done(function(data){
		var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			} else {
				x();
			 swal({   
			 	title: "Success!",  
			 	 text: "Student Added",   
			 	 timer: 3000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});

			 		$('form#newStudentForm').each(function() {
					this.reset();
				});	
			   

			    $('#myModal').modal('toggle');
			   	$('#new').hide();
				$('#student_number_error').html("");
			}
	});

	var student_no = $('#studentNo').val();
	var first_name = $('#firstName').val();
	var last_name = $('#lastName').val();
	var year_level = $('#yearLevel').val();
	var course = $('#course').val();
	var contact = $('#contactNo').val();

	$('#student_number').val(student_no);
	$('#student_no').val(student_no);
	$('#first_name').val(first_name);
	$('#last_name').val(last_name);
	$('#year_level').val(year_level + "/" + course);
	$('#contact').val(contact);
	


	//ajax
})











	$('#violation_selection').on('change select', function(e) {
		e.preventDefault();

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url : '/report-violation/search/violation',
			type : 'GET',
			data : {
				violation : $('#violation_selection').val()
			},
		}).done(function(data) {
			x();
			var violation_id = data.response['id'];
			var violation_offense_level = data.response['offense_level'];
			var violation_description = data.response['description'];
			var violation_sanction = data.response['sanction'];


	
			if (data == null) {
				alert('Not Found');
			} else {

				$('#violation_id').val(violation_id);
				$('#violation_offense_level').val(violation_offense_level);
				$('#violation_description').val(violation_description);
				//$('#violation_sanction').val(violation_sanction);
				//$('#violation_details').show();
				countOffense();

			}


	
		});

	});


function countOffense()
{
		$.ajax({
					headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
				},
					url : '/report-violation/offense-no',
					type: 'POST',
					data : $('form#reportViolationForm').serialize(),
				}).done(function(data){

					var sanction = data.sanction['sanction'];	
				var offense_no = data.response;
				if (offense_no != null)	{
					offense_no += 1;
					if (offense_no > 3 && offense_no <=6 && $('#violation_offense_level').val('Less Serious'))
					{
						$('#violation_offense_level').attr("style", "color:orange").val('Serious');
						
					}
					else if (offense_no >6 && $('#violation_offense_level').val('Serious'))
					{
						$('#violation_offense_level').attr("style", "color:red").val('Very Serious');
	
					}
				$('#committed_offense_number').val(offense_no);	
				$('#offense_number').val(offense_no);	
				$('#sanction').val(sanction);
				$('#violation_sanction').val(sanction);
				} else {
				$('#violation_offense_level').attr("style", "color:#cccc00");
				$('#committed_offense_number').val(1);
				$('#offense_number').val(1);
				$('#sanction').val(sanction);
				$('#violation_sanction').val(sanction);
				}

				//alert(	$('#committed_offense_number').val());
			 
				});
				
			}













//Lost and found		
//table init	
var lost_and_found_table = $('.lost-and-found-DT').DataTable({
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/lost-and-founds/items/all",
		type: "POST",
			},
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [
		{data : 'date_endorsed'},
		{data : 'item_description'},
		{data : 'endorser_name'},
		{data : 'founded_at'},
		{data : 'owner_name'},
		{data : 'status'},
		{data : 'date_claimed'},
		{data : 'claimer_name'},
	],
	
});

//Report Item
$('button#lost_and_found_reportBtn').click(function(e) {

		e.preventDefault();

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/lost-and-found/report-item",
			data : $('form#reportLostItem').serialize(),

		}).done(function(data) {

			var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			} else if (data.success == true) {

				$('form#reportLostItem').each(function() {
					this.reset();
				});
				
				swal({   
			 	title: "Success!",  
			 	 text: "Item Reported",   
			 	 timer: 2000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});
				lost_and_found_table.ajax.reload();


		

			}
		});

	});

//Cancel Button
	$('button#lost_and_found_cancelBtn').click(function() {
		$('form#reportLostItem').each(function() {
			this.reset();
		});
	}); 



//Get item details to Modal
	$('.lost-and-found-DT').on('click', 'tr', function(){
		var tr_id = $(this).attr('id');
		
		$('form#claim_item')[0].reset();
				$.ajax({
	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
	url: "/lost-and-found/item_details",
	type: "GET",
	data: {
		id : tr_id
	},
}).done(function(data){

	var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			} else {

				if (data.response == null)
				{
					return false;
				}
				else{
					if (data.response['status'] == "Claimed" || data.response['status'] == "Donated")
					{
						return false;
					}
				$('#LAF_Modal').modal('show');
				var item_id = data.response['id'];
				var item_description = data.response['item_description'];
				var date_endorsed = data.response['date_endorsed'];
				var found_at = data.response['founded_at'];
				var owner_name = data.response['owner_name'];
				var endorser_name = data.response['endorser_name'];

				$('#claim_id').val(item_id);
				$('#item_description').val(item_description);
				$('#date_endorsed').val(date_endorsed);
				$('#owner_name').val(owner_name);
				$('#found_at').val(found_at);
				$('#endorser_name').val(endorser_name);
			}
			}

});
	});


//Claim Item
$('#claim_btn').click(function(e){
e.preventDefault();

$.ajax({
	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
	url:'/lostandfound/update',
	type: 'POST',
	data: $('form#claim_item').serialize(),
}).done(function(data){
	var msg = "";
			if (data.success == false) {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

			}  else {
				$('#LAF_Modal').modal('hide');
				swal({   
			 	title: "Success!",  
			 	 text: "Item Claimed",   
			 	 timer: 2000, 
			 	 type: "success",  
			 	 showConfirmButton: false 
			 	});
				lost_and_found_table.ajax.reload();
			}
});
});


	
	
//Filter Results
$('select#sort_by').change(function(e){
	e.preventDefault();
	var selected = $('select#sort_by option:selected').index();
	

	if (selected == 0) {
		lost_and_found_table.ajax.reload();		
	} else if (selected == 1)	{
		lost_and_found_table.ajax.url('/lost-and-founds/items/sort_by=unclaimed').load();
	} else if (selected == 2) {
		lost_and_found_table.ajax.url('/lost-and-founds/items/sort_by=claimed').load();	
	} else if (selected == 3) {
		lost_and_found_table.ajax.url('/lost-and-founds/items/sort_by=donated').load();	
	}
	

	
});

//LAF Reports


//load reports on date change
$('#month').on('change', function(){


 $('#try').show();

var a  = $('#month').val();
$.ajax({
  headers : {
        'X-CSRF-Token' : $('input[name="_token"]').val()
      },
       	url : "/lost-and-found/reports/stats",
   type: 'POST',
   	data : {month : a},
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
    return y+" item/s "+ "(" + label + ")";
},
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });


	
$('.lost-and-found-reports-DT').DataTable().destroy();
$('.lost-and-found-reports-DT').DataTable({

	"ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/lost-and-found/reports/list",
		type: "POST",
		data : {month : a},
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
$('#try').hide();
});


//load current month reports



//Locker Management

	$('#add_locker_btn').click(function(e){
		e.preventDefault();

		$.ajax({
			url : '/lockers/add',
			type: 'POST',
			data: $('#add_locker_form').serialize(),
			success: function(data){
				console.log(data);
			},
			error: function(data){

			}
		});
	});









//Student Records

	var student_records_table = $('.student-records-DT').DataTable({
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/student-records/list",
		type: "POST",
			},
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [

		{data : 'student_no'},
		{data : 'first_name'},
		{data : 'last_name'},
		{data : 'course'},
		{data : 'year_level'},
		{data : 'contact_no'},

		
	],
	dom : '<"html5buttons"B>lTfgtip',
	buttons : [{
		extend : 'csv',
		title : 'STUDENT RECORDS',
	}, {
		extend :'excel',
		title : 'STUDENT RECORDS',
	} , {
		extend : 'pdf',
		title : 'STUDENT RECORDS',
	} , {
		extend : 'print',
		title : 'STUDENT RECORDS',
		customize : function(win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '8px').prepend('<label>Text</label>');
			$(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
		}
	}]
});




//Student Records

	var violation_records_table = $('.violation-records-DT').DataTable({
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/violation-records/list",
		type: "POST",
			},
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [

		{data : 'name'},
		{data : 'description'},
		{data : 'offense_level'},
		{data : 'first_offense_sanction'},
		{data : 'second_offense_sanction'},
		{data : 'third_offense_sanction'},
		
	],
	dom : '<"html5buttons"B>lTfgtip',
	buttons : [{
		extend : 'csv',
		title : 'VIOLATION RECORDS',
	}, {
		extend :'excel',
		title : 'VIOLATION RECORDS',
	} , {
		extend : 'pdf',
		title : 'VIOLATION RECORDS',
	} , {
		extend : 'print',
		title : 'STUDENT RECORDS',
		customize : function(win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '8px').prepend('<label>Text</label>');
			$(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
		}
	}]
});	

/*$("#import_btn").on('submit',(function(e) {
		e.preventDefault();




		console.log($('#import_file'));
console.log(this);
		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url: '/violation-records/importExcel',
			type: 'POST',
			data : $('#import_file'),
		success : function(response){
			console.log(data);
			console.log(response);
		
		},
		error : function(response){

		}	
	});
		}));
*/

$('#truncate_btn').click(function(e){
	e.preventDefault();

	swal({title: "Are you sure?",   
			text: "This will empty the violation records",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Proceed",   
			cancelButtonText: "Cancel",   
			closeOnConfirm: false,   
			closeOnCancel:true  }, 
			function(isConfirm){   
				if (isConfirm) {  
				$.ajax({
		headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
		url : '/violation-records/truncate',
		type: 'POST',
		success : function(response){
		if (response.success == true){
			swal({   
			 	title: "Success!",  
			 	 text: "Table truncated",   
			 	 timer: 2000, 
			 	 type: "success",  
			 	 showConfirmButton: false,

			 	});
			 	violation_records_table.ajax.reload();
		}
		else if (response.success == false) {
			var msg="";
				$.each(response.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Failed", msg, "error");  

				});




 
		}
				
	
		},
/*		error : function(response){
			if (response.success == false){
			
			}
		}*/
	});  		 
				} 
			/*	else {     
					alert closed 
				} */
			});
	
})

// DataTables
//with Buttons

$('.dataTables-example').DataTable({
	dom : '<"html5buttons"B>lTfgtip',

});

$('.dataTables-without-buttons').DataTable({
	dom : '<"html5buttons">'

});
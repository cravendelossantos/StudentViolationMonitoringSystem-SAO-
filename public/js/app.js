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

$('#LAF_date_picker .input-group.date').datepicker({
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

$('#first_sem_range .input-daterange').datepicker({
	keyboardNavigation: false,
	forceParse: false,
	autoclose: true
});


$('#second_sem_range .input-daterange').datepicker({
	keyboardNavigation: false,
	forceParse: false,
	autoclose: true
});

$('#summer_range .input-daterange').datepicker({
	keyboardNavigation: false,
	forceParse: false,
	autoclose: true
});

$('#sy_date_btn').click(function (e){
	e.preventDefault();
	$.ajax({
		type : "GET",
		url : "/settings/dates/school-year/set",
		data : $('form#sy_form').serialize(),

	}).fail(function(data){
		var errors = $.parseJSON(data.responseText);
		var msg="";

		$.each(errors.errors, function(k, v) {
			msg = msg + v + "\n";
			swal("Oops...", msg, "warning");

		});


	}).done(function(data) {

		swal({   
			title: "Are you sure?",   
			text: "This will create a new school year (" + $('#school_year').val() + " )" ,   
			type: "warning",   
			showCancelButton: true,  
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Submit",   
			closeOnConfirm: true
		}, function(){  
			$.ajax({
				headers : {
					'X-CSRF-Token' : $('input[name="_token"]').val()
				},
				type : "POST",
				url : "/settings/dates/school-year/set",
				data : $('form#sy_form').serialize(),
			}).done(function(data){
				swal({   
					title: "Success!",  
					text: "School Year added",   
					timer: 1000, 
					type: "success",  
					showConfirmButton: false 

					

				});
		/*			$('form#sy_form').each(function() {
					this.reset();
				});	*/
			});
		});
	});
});

//School Year
var school_year_table = $('.school-year-DT').DataTable({
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
		url : "/settings/show/school-years",
		type: "POST",
	},
	"rowId" : 'id',	
	"columns" : [
	{data : 'school_year'},
	{data : 'term_name'},
	{data : 'start'},
	{data : 'end'},

	]
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

//getViolation();
/*offenseLevelChange();
function getViolation()
{
	$.ajax({
		headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
		url : '/get-violation/list',
		type: 'POST',
		data: {offense_level : $('#offense_level').val(),},

	}).done(function(data){
	
		if (data.violations.length == 0)
		{
			$('#violations_import').show();
		}
		$.each(data.violations, function(key, value){
				// $('#violation_selection').val(data.violations[key].name);
			   $('#violation_selection').append($("<option></option>").attr("value",value.name).text(value.name));
		});
		

	});
}



function offenseLevelChange()
{



$('#offense_level').on('change', function(e){
	$('#violation_selection').find('option').remove();

	   $('#violation_selection')
         .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));
getViolation();


});
}*/

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

// $('#offense_level').prop('disabled',true);

$('button#report_btn').click(function(e){
	e.preventDefault();

	$.ajax({
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		type : "GET",
		url : "/report-violation/report",
		data : $('form#reportViolationForm').serialize(),

	}).fail(function(data){
				//        var errors = data.responseText;
				var errors = $.parseJSON(data.responseText);
				var msg="";
				
				$.each(errors.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});



			}).done(function(data){

				var msg = "";



				swal({   
					title: "Are you sure?",   
					text: "You will not be able to change or delete this record",   
					type: "warning",   
					showCancelButton: true,  
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "Save",   
					closeOnConfirm: true
				}, function(){  
					$.ajax({
						headers : {
							'X-CSRF-Token' : $('input[name="_token"]').val()
						},
						type : "POST",
						url : "/report-violation/report",
						data : $('form#reportViolationForm').serialize(),
					}).fail(function (data){

						var errors = $.parseJSON(data.responseText);
						
						swal("Oops...", errors.errors, "warning");
						
	
					}).done(function(data){

						var sent = true;
						var message = "Guardian notification sent!";

						if (data.notification[0].sent == false){
							sent = false;
							message = "Guardian notification not sent\n" + data.notification[0].response;
						} else if (data.notification[0].sent == true){
							message = data.notification[0].response;
						} else {
							message = "";
						}
						console.log(data);

						swal({   
							title: "Success!",  
							text: "Violation Reported\n\n" + message,
							type: "success",  
							showConfirmButton: true 


						});
						
						$('#v_id').val(data.response);
						$('form#reportViolationForm').each(function() {
							this.reset();
						});	
						violation_reports_table.ajax.reload();


						$('#offense_number').val("");
						$('#committed_offense_number').val("");
						$('#offense_level').val("");
						$('#student_number').val("");
						$('#complainant_id').val("");
						$('#violation_id').val("");


						$('#last_name').val("").attr("readonly",false);
						$('#first_name').val("").attr("readonly",false);

						$('#year_level').val("").attr("readonly",false);
/*$('#violation_selection').find('option').remove();
		 $('#violation_selection')
         .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));*/

                    $('#violation_date_picker .input-group.date').datepicker('setDate', null);
                    $('#report_btn').prop('disabled', true);
                    // $('#offense_level').prop('disabled', true);
                });
				});
			});
		});



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
						$('#guardian_name').val("");
						$('#guardian_contact_no').val("");
						$('#student_number').val("");
						$('#violation_id').val("").attr("readonly",false);

						$('#student_name').val("").attr("readonly",false);
						$('#year_level').val("").attr("readonly",false);
						// $('#offense_level').prop('disabled',true);
					}
					else if(data[0].current_status == 'Excluded'){
						$('#report_btn').prop('disabled', true);
						//$('#offense_level').prop('disabled', true);
						$('form#reportViolationForm').each(function() {
							this.reset();
						});	
						swal("Oops...", "This student is Excluded", "error");
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
						var guardian_name = data[0].guardian_name;
						var guardian_contact_no = data[0].guardian_contact_no;

						$('#student_number').val(value);

						$('#student_name').val(f_name + " " + l_name).attr("readonly",true);
				//$('#course').val(ui.item.course);
				$('#year_level').val(year_level + "/" + course).attr("readonly",true);
				$('#guardian_contact_no').val(guardian_contact_no).attr("readonly",true);
				$('#guardian_name').val(guardian_name).attr("readonly",true);
				//countOffense();
				//$('#offense_level').prop('disabled',false);
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
/*	$('#student_name').val(first_name + " " + last_name);
	$('#year_level').val(year_level + " / " + course);
	$('#contact').val(contact);*/

	$('#find_student').trigger('click',function(e){
		e.preventDefault();
	});	


	//ajax
});








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
		console.log($('#violation_selection').val());
		x();
		var violation_id = data.response['id'];
		var violation_offense_level = data.response['offense_level'];
		var violation_description = data.response['description'];
			//var violation_sanction = data.response['sanction'];
			var offense_level = data.response['offense_level'];


			if (data == null) {
				alert('Not Found');
			} else {

				$('#violation_id').val(violation_id);
				$('#violation_offense_level').val(violation_offense_level);
				$('#violation_description').val(violation_description);
				$('#offense_level').val(offense_level);

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
		var offense_no = data.offense_no;
		var diff_offense_no = data.diff_type_offense;

				// if (offense_no != null)	{
				// 	offense_no += 1;

				var current_offense_no = parseInt(offense_no);
				var current_diff_offense_no = parseInt(diff_offense_no);
				var total_serious_offense_no = data.total_serious_offense_no;


				if (offense_no == 3 && diff_offense_no == 2 && $('#offense_level').val() == 'Less Serious')
				{

						//Warning if same and diff type will elevate
						swal("Warning!", 'This will be the third commission of student with student number ' + $('#student_number').val() + ' of ' + (current_offense_no) +' same type of ' +  $('#offense_level').val()  + 
							'\n\n .This student also committed ' + (current_diff_offense_no) +' different types of ' +  $('#offense_level').val() ,  "warning");

					}
					else if (offense_no == 3 && $('#offense_level').val() == 'Less Serious')
					{
						swal("Warning!", 'This will be the third commission of student with student number ' + $('#student_number').val() + ' of ' + (current_offense_no) +' same type of ' +  $('#offense_level').val() + ' offense level' ,  "warning");
					}


					//checks if diff types = 2 and if the selected violation is same type
					else if (diff_offense_no == 2 && offense_no <= 1 && $('#offense_level').val() == 'Less Serious')
					{
						swal("Warning!", 'The student with student number ' + $('#student_number').val() + ' committed ' + (diff_offense_no) + ' different type of ' +  $('#offense_level').val() + '. This will be the third commision of different types of Less Serious offense and will elevate to Serious offense level. Please also check if the violation is already elevated and select the corresponding violation for elevation. '  ,  "warning");

				/*			$('#offense_level').prop('selectedIndex', 2);
							$('#violation_selection').find('option').remove();	
							  $('#violation_selection')
        					 .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));

                    getViolation();*/
						//offenseLevelChange();
						// elevateToSeriousDiff();
					}

					else if (offense_no > 3 && diff_offense_no == 2 && $('#offense_level').val() == 'Less Serious')
					{
						swal("Warning!", 'This will be the fourth commission of student with student number ' + $('#student_number').val() + ' of ' + (current_offense_no) +' same type of ' +  $('#offense_level').val()  + 
							'. The offense level will elevate to Serious offense level. Please also check if the violation is already elevated and select the corresponding violation for elevation.' + 
							'\n\n This student also committed 2 different types of same Offense Level' ,  "warning");

						//'elevate same type and warning for diff type'



			/*				$('#offense_level').prop('selectedIndex', 2);
							$('#violation_selection').find('option').remove();	
							  $('#violation_selection')
        					 .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));
                    */
        				//getViolation();
						// offenseLevelChange();
						// elevateToSeriousSame();
						
					}

					else if (offense_no > 3 && $('#offense_level').val() == 'Less Serious')
					{
						swal("Warning!", 'This will be the fourth commission of student with student number ' + $('#student_number').val() + ' of ' + (current_offense_no) +' same type of ' +  $('#offense_level').val()  + 
							'. The offense level will elevate to Serious offense level. Please also check if the violation is already elevated and select the corresponding violation for elevation.' ,  "warning");


			/*				$('#offense_level').prop('selectedIndex', 2);
							$('#violation_selection').find('option').remove();	
							  $('#violation_selection')
        					 .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));

                    getViolation();*/
                }

					//must get all the serious (3) within a sem
			/*		if ((total_serious_offense_no) == 2 && $('#offense_level').val() == 'Serious')
					{
						swal("Warning!", 'The student with student number ' + $('#student_number').val() + ' committed ' + (total_serious_offense_no) + ' different type of ' +  $('#offense_level').val() + '. This will be the third commision of different types of Serious offense and will elevate to Very-Serious offense level. Please also check if the violation is already elevated and select the corresponding violation for elevation. '  ,  "warning");

							$('#offense_level').prop('selectedIndex', 3);
							$('#violation_selection').find('option').remove();	
							  $('#violation_selection')
        					 .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));

        				getViolation();
						//offenseLevelChange();
						// elevateToSeriousDiff();
					}*/




	/*				 if (diff_offense_no == 3)

					{	
				
						$('#offense_level').prop('selectedIndex', 2);
							$('#violation_selection').find('option').remove();	
							  $('#violation_selection')
         .append($("<option selected='' disabled=''></option>")
                    .attr("value", '0')
                    .text('Select violation'));

         				
						//getViolation();
						offenseLevelChange();
						elevateToSeriousDiff();


					}



					*/

				// 	else if (offense_no >6 && $('#violation_offense_level').val('Serious'))
				// 	{
				// 		$('#violation_offense_level').attr("style", "color:red").val('Very Serious');

				// 	}
				// $('#committed_offense_number').val(offense_no);	
				// $('#offense_number').val(offense_no);	
				// $('#sanction').val(sanction);
				// $('#violation_sanction').val(sanction);
				// } 
				$('#offense_number').val(offense_no);
				$('#committed_offense_number').val(offense_no);

				$('#sanction').val(sanction);
				$('#violation_sanction').val(sanction);
				
				// else {
				// $('#violation_offense_level').attr("style", "color:#cccc00");
				// $('#committed_offense_number').val(1);
				// $('#offense_number').val(offense_no);
				// $('#sanction').val(sanction);
				// $('#violation_sanction').val(sanction);



				// }

				//alert(	$('#committed_offense_number').val());

			});

}



function elevateToSeriousDiff()
{
	var data = 'Commission of three less serious ';
	$.ajax({
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		url : 'report-violation/serious/elevate',
		type: 'POST',
		data: {name : data},
	}).done(function (data){
		console.log(data.violation.description);

				// $('#violation_selection').val(data.violations[key].name);
				$('#violation_selection')
				.append($("<option></option>")
					.attr("value",data.violation.name)
					.text(data.violation.name));

				$('#violation_selection').prop('selectedIndex', 0);

			});


}

function elevateToSeriousSame()
{
	var data = 'Repeated commision of less serious';
	$.ajax({
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		url : 'report-violation/serious/elevate',
		type: 'POST',
		data: {name : data},
	}).done(function (data){
		console.log(data.violation.name);

				// $('#violation_selection').val(data.violations[key].name);
				$('#violation_selection')
				.append($("<option></option>")
					.attr("value",data.violation.description)
					.text(data.violation.name));

				$('#violation_selection').prop('selectedIndex', 0);

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
		          data: function (d) {

          d.school_year = $('#school_year').val();
        },
	},
	
	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [
	{data : 'date_reported'},
	{data : 'item_description'},
	{data : 'endorser_name'},
	{data : 'found_at'},
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
		type : "GET",
		url : "/lost-and-found/report-item",
		data : $('form#reportLostItem').serialize(),

	}).fail(function(data){

		var errors = $.parseJSON(data.responseText);
		var msg="";

		$.each(errors.errors, function(k, v) {
			msg = msg + v + "\n";
			swal("Oops...", msg, "warning");

		});


	}).done(function(data) {

		swal({   
			title: "Are you sure?",   
			text: "This action cannot be undone",   
			type: "warning",   
			showCancelButton: true,  
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Submit",   
			closeOnConfirm: true 
		}, function(isConfirm){  

			if (isConfirm){
				$.ajax({
					headers : {
						'X-CSRF-Token' : $('input[name="_token"]').val()
					},
					type : "POST",
					url : "/lost-and-found/report-item",
					data : $('form#reportLostItem').serialize(),
				}).done(function(data){
					swal({   
						title: "Success!",  
						text: "Item Reported!",   
						timer: 1000, 
						type: "success",  
						showConfirmButton: false 



					});
					$('form#reportLostItem').each(function() {
						this.reset();
					});	
					lost_and_found_table.ajax.reload();
				});



			}		
			else {
				return false;
			}

		});
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
				var date_reported = data.response['date_reported'];
				var found_at = data.response['founded_at'];
				var owner_name = data.response['owner_name'];
				var endorser_name = data.response['endorser_name'];

				$('#claim_id').val(item_id);
				$('#item_description').val(item_description);
				$('#_date-reported').val(date_reported);
				$('#owner_name').val(owner_name);
				$('#found_at').val(found_at);
				$('#endorser_name').val(endorser_name);
			}
		}

	});
});


$('#claimer_name').keyup(function(e){
	
	if ($('#owner_name').val().toUpperCase() == $('#claimer_name').val().toUpperCase()){
		$('#claimer_name_error').html("");
	}
	else{
		$('#claimer_name_error').html("Claimer name doesn't match with owner name");
	}

});
//Claim Item
$('#claim_btn').click(function(e){
	e.preventDefault();



	
	$.ajax({
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		url:'/lostandfound/update',
		type: 'GET',
		data: $('form#claim_item').serialize(),
	}).fail(function(data){

		var errors = $.parseJSON(data.responseText);
		var msg = "";

		$.each(errors.errors, function(k, v) {
			msg = msg + v + "\n";
			swal("Oops...", msg, "warning");

		});
	}).done(function(data){


		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url:'/lostandfound/update',
			type: 'POST',
			data: $('form#claim_item').serialize(),
		});
		$('#LAF_Modal').modal('hide');
		swal({   
			title: "Success!",  
			text: "Item Claimed",   
			timer: 2000, 
			type: "success",  
			showConfirmButton: false 
		});
		lost_and_found_table.ajax.reload();

	});
});




//Filter Results
$('select#sort_by').change(function(e){
	e.preventDefault();
	var selected = $('select#sort_by option:selected').index();
	

	if (selected == 0) {
		lost_and_found_table.ajax.url('/lost-and-founds/items/all').load();		
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
/*$('#show_LAF_stats').on('click', function(){


});*/
	
// 	$.ajax({
// 		headers : {
// 			'X-CSRF-Token' : $('input[name="_token"]').val()
// 		},
// 		url : "/lost-and-found/reports/stats",
// 		type: 'POST',
// 		data : {LAF_stats_from : $('#LAF_stats_from').val(),
// 				LAF_stats_to : $('#LAF_stats_to').val(),
// 		},
// 		async: false,
// 		success: function(response){
// 			items = response;


// 		}
// 	});

// 	var data = [{
// 		label: "UNCLAIMED",
// 		data: items['unclaimed'],
// 		color: "#d3d3d3",
// 	}, {
// 		label: "CLAIMED",
// 		data: items['claimed'],
// 		color: "#54cdb4",
// 	}, {
// 		label: "DONATED",
// 		data: items['donated'],
// 		color: "#1ab394",
//     }, ];


// function labelFormatter(label, series) {
//     return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>"    + label + "<br/>" + series.data[0][1] + "%</div>";
// }


//     var plotObj = $.plot($("#flot-pie-chart"), data, {
//  series: {
//         pie: {
//             show: true,
//             radius: 1,
//             label: {
//                         show: true,
//                         radius: 2 / 3,
//                         formatter: function (label, series) {
//                             return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';

//                         },
//                         threshold: 0.1
//                     }
//         }
//     },
//     legend: {
//         show: false
//     },

//    	 	grid: {
//     		hoverable: true
//     	},
//     	tooltip: true,
//     	tooltipOpts: {
//         	 //percentage content: "%y.0, %s", // show value to 0 decimals
//         	 content: function(label,x,y){
//         	 	return y+" item/s "+ "(" + label + ")";
//         	 },
//         	 shifts: {
//         	 	x: 20,
//         	 	y: 0
//         	 },
//         	 defaultTheme: false
//         	}
//         });




//load current month reports



//Locker Management
function lockerRange()
{
	var num = parseInt($('#no_of_lockers').val());
	var from = parseInt($('#from').val());

	var val = num + from;
	$('#to').val(val - 1);

}





$('#from').on('input', function (){
	lockerRange();
});

$('#no_of_lockers').on('input', function (){
	lockerRange();
});

/*
$('#location').change(function (e){
	var building = $('#location').val();

	if (building == 'new')
	{
		$('#new_location').show();
	} else {

		$('#new_location').hide();

	}

});
*/


$('#add_locker_btn').click(function(e){
	e.preventDefault();


	swal({   
		title: "Are you sure?",   
		text: "This action will add new lockers",   
		type: "warning",   
		showCancelButton: true,  
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Submit",   
		closeOnConfirm: true 
	}, function(){ 
		$.ajax({
			url : '/lockers/add',
			type: 'POST',	
			data: $('#add_locker_form').serialize(),
		}).fail(function(data){
			var errors = $.parseJSON(data.responseText);
			var msg="";

			$.each(errors.errors, function(k, v) {
				msg = msg + v + "\n";
				swal("Oops...", msg, "warning");

			});


		}).done(function(data) {
			swal('Success!' , 'New Locker location added!', "success");
			$('form#add_locker_form')[0].reset();
			lockers_table.ajax.reload();
		});
	});

});
var lockers_table = $('.lockers-DT').DataTable({
	"processing": true,
	"serverSide": true,
	"ajax": {
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		url : "/lockers/all",
		type: "POST",
		data: function (d) {
                d.status_sort = $('#status_sort').val(),
                d.location_sort = $('#location_sort').val();
            },
	},
	
	// "bSort" : true,
	/*"bFilter" : true,*/
	// "order": [[ 0, "desc" ]],
	"rowId" : 'locker_no',	
	"columns" : [

	{data : 'locker_no'},
	{data : 'floor'},
	{data : 'building'},
	{data : 'lessee_name'},
	{data : 'status'},		  




	],
	dom : '<"html5buttons"B>lTfgtip',
	buttons : [{
		extend : 'csv',
		title : 'Lockers',
	}, {
		extend :'excel',
		title : 'Lockers',
	} , {
		extend : 'pdf',
		title : 'Lockers',
	} , {
		extend : 'print',
		title : 'Lockers',
		customize : function(win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '8px').prepend('<label>Text</label>');
			$(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
		}
	}]
});



$('#status_sort').change(function(){
	lockers_table.ajax.reload();
});


$('#location_sort').change(function(){
	lockers_table.ajax.reload();
});





$('.lockers-DT').on('click', 'tr', function(){
	var tr_id = $(this).attr('id');
		$('#occupancy_div').hide();
		$('#m_update_status').prop('selectedIndex',0);
		//$('form#claim_item')[0].reset();
		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url: "/locker/details",
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
					if (data.response['status'] == "Occupied")
					{
						return false;
					}
					$('#lockers_modal').modal('show');

					var locker_no = data.response['locker_no'];
					var location = data.response['location'];


					$('#m_locker_no').val(locker_no);
					$('#_m_locker_no').val(locker_no)
					$('#m_location').val(location);

					var current_status = data.response['status'];

					var status_color = "";

					if (current_status == 'Available'){
						status_color = 'Green';
					} else if (current_status == 'Damaged'){
						status_color = 'Red';
					} else if (current_status == 'Locked'){
						status_color = 'Gold';
					} else if (current_status == 'Occupied'){
						status_color = 'Blue';
					}

					$('#m_current_status').val(current_status).css('color', status_color);

					$('#m_update_status').change(function(e){

						
						if (this.value == 'Occupied')
						{
							
							$('#occupancy_div').show();
							
						} else{
							
							$('#occupancy_div').hide();
							
						}
						
					});

				}
			}

		});
	});



$('#locker_update').click(function(e){
	e.preventDefault();

	$.ajax({
		headers : {
			'X-CSRF-Token' : $('input[name="_token"]').val()
		},
		url : '/locker/update-status',
		type: 'POST',
		data: $('form#locker_status_update').serialize(),

	}).fail(function(data){
		var errors = $.parseJSON(data.responseText);
		var msg="";

		$.each(errors.errors, function(k, v) {
			msg = msg + v + "\n";
			swal("Oops...", msg, "warning");
		});

	}).done(function(data){

		//$('#locker_status_update')[0].reset();
		//locker_contract, return occupied data from the backend and open the contract div
		$('#occupancy_div').hide();
		$('#lockers_modal').modal('hide');
		
		swal("Success", "Locker Updated!", "success");
		$('#location_sort').prop('selectedIndex', 0);
		$('#status_sort').prop('selectedIndex', 0);
		//printlockercontract
		if (data['occupied'] == true)
		{
			console.log($('#c_fname').val());
			$('#locker_contract').show();
			$('#c_fname').html($('#m_lessee_name').val());

		}
		$('form#locker_status_update')[0].reset();

		lockers_table.ajax.reload();

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
	"rowId" : 'student_no',	
	"columns" : [

	{data : 'student_no'},
	{data : 'first_name'},
	{data : 'last_name'},
	{data : 'course'},
	{data : 'year_level'},
	{data : 'student_contact_no'},
	{data: 'action', name: 'action', orderable: false, searchable: false},

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
		url : "/violation-list/all",
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
				closeOnConfirm: true,   
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

		});










/*
	$('#sanctions_find_student').click(function(e){

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			url: '/sanctions/search/student',
			type: 'POST',
			data: { term : $('#student_no').val()},

		}).done(function (data){
			 
		});
	});*/


/*

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
				
				});*/



//Time log




/*
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});*/





	$('#new_log').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url : '/community-service/new_log',
			type: 'GET',
			data: $('#new_log_form').serialize(),

		}).fail(function(data){
			var errors = $.parseJSON(data.responseText);
			var msg="";

			$.each(errors.errors, function(k, v) {
				msg = msg + v + "\n";
				swal("Oops...", msg, "warning");

			});

		}).done(function(data){

		});
	});




	//$('.sanctions-DT').DataTable().destroy();


	


/*var CS_table = $('.CS-DT').DataTable({
	
	"bFilter" : true,
	"processing": true,
    "serverSide": true,
    "ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val(),
			},
    	url : "/community-service/search",
	
		},

	"bSort" : true,
	"bFilter" : true,
	"order": [[ 0, "desc" ]],
	"rowId" : 'id',	
	"columns" : [
		
		{data : 'student_id'},
	
	],
});





*/








/*

	$('#CS_find_student').click(function(e){
		searchStudentCS();
		searchStudentSanctions();
		
		e.preventDefault();

	});
	*/



















// DataTables
//with Buttons

$('.dataTables-example').DataTable({
	dom : '<"html5buttons"B>lTfgtip',

});

$('.dataTables-without-buttons').DataTable({
	dom : '<"html5buttons">'

});
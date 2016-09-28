/**
 * @author CRAVEN
 */
	


//Super User	
$('#register_super_btn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "GET",
		url : "/user-management/super_user/validate",
		data : $('form#regFormSuperUser').serialize(),

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
					text: "This will create a new administrator user",   
					type: "warning",   
					showCancelButton: true,  
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Submit",   
				    closeOnConfirm: false 
				}, function(){  
					$.ajax({
						headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/user-management/super_user",
			data : $('form#regFormSuperUser').serialize(),
					}).done(function(data){
							 swal({   
			 			title: "Success!",  
			 	 text: "Account successfully created!",   
			 	 timer: 1000, 
			 	 type: "success",  
			 	 showConfirmButton: false 

					
	
			 	});
							 	$('form#regFormSuperUser').each(function() {
					this.reset();
				});	
	});
});
});
});



//Admin	
$('#register_admin_btn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "GET",
		url : "/user-management/admin/validate",
		data : $('form#regFormAdmin').serialize(),

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
					text: "This will create a new user with " + $('#user_type').val() + " user type",   
					type: "warning",   
					showCancelButton: true,  
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Submit",   
				    closeOnConfirm: false 
				}, function(){  
					$.ajax({
						headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/user-management/admin",
			data : $('form#regFormAdmin').serialize(),
					}).done(function(data){
							 swal({   
			 			title: "Success!",  
			 	 text: "Account successfully created!",   
			 	 timer: 1000, 
			 	 type: "success",  
			 	 showConfirmButton: false 

	
			 	});

				$('form#regFormAdmin').each(function() {
					this.reset();
				});	
	});
});
});
});



//Roles Mgt

/*$('#roles_btn').click(function(e){
		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},		
			url: '/user-management/roles/assign',
			type: 'POST',
			data: $('form#rolesForm').serialize(),

		});
});*/
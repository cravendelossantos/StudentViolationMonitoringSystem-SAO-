/**
 * @author CRAVEN
 */
	
	
$('#registerBtn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/register",
		data : $('form#regForm').serialize(),

	}).done(function(data) {

		var msg = "";
		if (data != "") {
			$.each(data.errors, function(k, v) {
				msg = msg + v + "\n";
				swal("Oops...", msg, "warning");
			});

		} else {

			$('form#regForm').each(function() {
				$('form#regForm').hide();
				$('#regDone').toggle(200);
				$('#regDone').html("<br><br><br><br><br><div class='alert alert-success'><h1 style='margin-left : 20px'>Success! <span class='glyphicon glyphicon-ok'></span></h1><p style='margin-left : 50px'>Your account was successfully created.<br>Please Click <a href=/login> here </a> to Login.</p><br><br></div>");

			});

		}
	});

});

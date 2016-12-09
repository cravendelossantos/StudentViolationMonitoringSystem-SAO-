$('#registerBtn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/reportViolation",
		data : $('form#reportViolationForm').serialize(),

	}).done(function(data) {

		var msg = "";
		if (data != "") {
			$.each(data.errors, function(k, v) {
				msg = msg + v + "\n";
				swal("Oops...", msg, "warning");
			});

		} else {

				ladda.start();

		}
	});

});

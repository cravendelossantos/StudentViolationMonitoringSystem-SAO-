//nav load page
$(document).ready(function() {

	$('ul#side-menu li a').click(function(e) {
		e.preventDefault();

		var page = $(this).attr('href');

		$('#wrapper').load(page);
		window.history.pushState('', '', '/' + page);

	});

});

//date picker
$('#data_1 .input-group.date').datepicker({
	todayBtn : "linked",
	keyboardNavigation : false,
	forceParse : false,
	calendarWeeks : true,
	autoclose : true,
	format : 'yyyy-mm-dd'
});

// DataTables

//with Buttons

$('.dataTables-example').DataTable({
	dom : '<"html5buttons"B>',
	buttons : [{
		extend : 'csv'
	}, {
		extend : 'excel',
		title : 'SAO Violation Records'
	}, {
		extend : 'pdf',
		title : 'SAO Violation Records'
	}, {
		extend : 'print',
		customize : function(win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '10px');

			$(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
		}
	}]

});

//without buttons

$('.dataTables-example1').DataTable({
	dom : '<"html5buttons">'

});

//register

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

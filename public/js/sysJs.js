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

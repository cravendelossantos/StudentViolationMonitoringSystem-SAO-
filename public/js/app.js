$('#data_1 .input-group.date').datepicker({
	todayBtn : "linked",
	keyboardNavigation : false,
	forceParse : false,
	calendarWeeks : true,
	autoclose : true,
	format : 'yyyy-mm-dd'
});

//LostandFound
$('.lost-and-found-DT').DataTable();

//addItem

// DataTables
//with Buttons

$('.dataTables-example').DataTable({
	dom : '<"html5buttons"B>lTfgtip',

});

$('.dataTables-without-buttons').DataTable({
	dom : '<"html5buttons">'

});

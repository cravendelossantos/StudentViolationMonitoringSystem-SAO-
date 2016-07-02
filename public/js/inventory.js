$('#data_1 .input-group.date').datepicker({
	todayBtn : "linked",
	keyboardNavigation : false,
	forceParse : false,
	calendarWeeks : true,
	autoclose : true,
	format : 'yyyy-mm-dd'
});

//Borrowed Items

$('#inputBorrowBtn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/inventory/borrow",
		data : $('form#inputBorrow').serialize(),
	}).done(function(data) {
		var msg = "";
		if (data != "") {
			$.each(data.errors, function(k, v) {
				msg = v + "\n" + msg;
			});

			swal("Oops...", msg, "warning");
		} else {
			swal("Success!", "Report Added!", "success");
			$('form#inputBorrow').each(function() {
				this.reset();
				window.location.reload();

			});

		}
	});
});

//returned items

$('#returnBtn').click(function(e) {
	e.preventDefault();

	$.ajax({
		type : "POST",
		url : "/inventory/return",
		data : $('form#returnForm').serialize(),
	}).done(function(data) {
		var msg = "";

		if (data != "") {
			$.each(data.errors, function(a, v) {
				msg = msg + v + "\n";
			});

			swal("Oops...", msg, "warning");

		} else {

			swal({
				title : "Success!",
				text : "Item Status Updated",
				type : "success",

				confirmButtonText : "Ok",

				closeOnConfirm : true,

			}, function(isConfirm) {
				if (isConfirm) {
					window.location.reload();
				}
			});

		}
	});

});

// Search by Unique Identifier

$('#uniqueSrch').keyup(function() {
	$.ajax({
		type : "GET",
		url : "/inventory/srchUnique",
		data : {
			uniqueSrch : $('#uniqueSrch').val()
		},
	}).done(function(data) {

		if (data.itemsTbl['status'] == "Not Available") {
			swal("Oops...", "Cannot borrow item. Item is not available", "warning");
			$('#unique-id').focus();
			return false;
		} else {
			var itemData = String(data.itemsTbl['item_type']);
			var modelData = String(data.itemsTbl['model']);
			var brandData = String(data.itemsTbl['brand']);
			var uniqueData = String(data.itemsTbl['unique_identifier']);
			var itemNoData = String(data.itemsTbl['item_no']);

			$('#item').val(itemData);
			$('#model').val(modelData);
			$('#brand').val(brandData);
			$('#itemNo').val(itemNoData);
			$('#unique').val(uniqueData);
			$('#itemNoSrch').val(itemNoData);
		}
	});
});

//Search by item number//

$('#itemNoSrch').keyup(function() {
	$.ajax({
		type : "GET",
		url : "/inventory/srchItemNo",
		data : {
			itemNoSrch : $('#itemNoSrch').val()
		},
	}).done(function(data) {

		if (data.itemsTbl['status'] == "Not Available") {
			swal("Oops...", "Cannot borrow item. Item is not available", "warning");
			$('#unique-id').focus();
			return false;
		} else {
			var itemData = String(data.itemsTbl['item_type']);
			var modelData = String(data.itemsTbl['model']);
			var brandData = String(data.itemsTbl['brand']);
			var uniqueData = String(data.itemsTbl['unique_identifier']);
			var itemNoData = String(data.itemsTbl['item_no']);
			$('#item').val(itemData);
			$('#model').val(modelData);
			$('#brand').val(brandData);
			$('#itemNo').val(itemNoData);
			$('#unique').val(uniqueData);
			$('#uniqueSrch').val(uniqueData);
		}
	});
});

// Advanced Search

var $rows = $('#tbody tr');
$('#advancedSrch').keyup(function() {
	var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

	$rows.show().filter(function() {
		var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
		return !~text.indexOf(val);
	}).hide();
});

//Accounts Authorizations

$('#usertypeBtn').click(function() {

	var data = {
		updates : []
	};

	$(".userTypeSelection").each(function() {
		var item = {
			id : $(this).data("id"),
			user_type : $(this).val()
		};

		data.updates.push(item);
	});

	console.log(data);

	swal({
		title : "Are you sure?",
		text : "Grant user(s) type",
		type : "warning",
		showCancelButton : true,

		confirmButtonText : "Yes",
		closeOnConfirm : false

	}, function() {

		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/inventory/manageAccounts",
			data : data,

		}).done(function(data) {
			if (data.success) {

				console.log(data);

				swal({
					title : "Success!",
					text : "User(s) Granted!",
					type : "success",

					confirmButtonText : "Ok",

					closeOnConfirm : true,

				}, function(isConfirm) {
					if (isConfirm) {
						window.location.reload();
					}
				});

			} else {

			}

		});
	});

});

//add items

$('#addItemBtn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/inventory/addItems",
		data : $('form#addItemForm').serialize(),
	}).done(function(data) {
		var msg = "";
		if (data != "") {
			$.each(data.errors, function(k, v) {
				msg = msg + v + "\n";
			});

			swal("Oops...", msg, "warning");
		} else {

			swal("Success!", "Item Added!", "success");
			$('form#addItemForm').each(function() {
				this.reset();
			});
			window.location.reload();

		}
	});
});

$(function() {
	$("#item").keyup(function() {

		var $value = $("#item").val().toLowerCase();
		console.log($value);
		if ($value == "laptop") {
			$("#date_deployed").attr("disabled", false);

		} else if ($value == "mouse") {
			$("#date_deployed").attr("disabled", false);

		} else if ($value == "headset") {
			$("#date_deployed").attr("disabled", false);

		} else {

			$("#morning_shift").attr("disabled", "disabled");
			$("#night_shift").attr("disabled", "disabled");
			$("#date_deployed").attr("disabled", "disabled");
			$('#date_1').attr("disabled", "disabled");
			$("#morning").val(" ");
			$("#night").val(" ");
			//$("#morning").prop("disabled", "disabled");
			//$("#night").prop("disabled", "disabled");

		}
	});
});

$('#date_deployed').change(function() {

	var $dateValue = $("#date_deployed").val();

	if ($dateValue != null) {
		if ($('#date_deployed').attr("disabled")) {
			console.log($dateValue);
			$("#morning_shift").attr("disabled", true);
			$("#night_shift").attr("disabled", true);

		} else {
			$("#morning_shift").attr("disabled", false);
			$("#night_shift").attr("disabled", false);
		}

	}

	if ($dateValue == "") {

		$("#morning_shift").attr("disabled", true);
		$("#night_shift").attr("disabled", true);
	}

});

$('#date_deployed').keyup(function() {

	var $dateValue = $("#date_deployed").val();
	console.log($dateValue);

	if ($dateValue != null) {
		$("#morning_shift").attr("disabled", false);
		$("#night_shift").attr("disabled", false);
	}
	if ($dateValue == "") {
		$("#morning_shift").attr("disabled", true);
		$("#night_shift").attr("disabled", true);
	}

});

//Returned Items

function toggleDiv() {
	$('#borrowLbl').toggle(200);
	$('#trow').toggle(200);
	$('#reportTxt').toggle(200);
}


$("#uniqueIdentifierSearch").keyup(function() {
	_this = this;
	// Show only matching TR, hide rest of them
	$.each($("#table tr td:#uniqueI"), function() {
		if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
			$(this).hide();
		else
			$(this).show();
	});
});

$('.itemUniqueLink').on('click', function() {
	$("#myModal").modal("show");
	$("#itemTypeId").val($(this).closest('tr').children()[0].textContent);
	$("#modelId").val($(this).closest('tr').children()[1].textContent);
	$("#brandId").val($(this).closest('tr').children()[2].textContent);
	$("#uniqueId").val($(this).closest('tr').children()[3].textContent);
	$("#itemNoId").val($(this).closest('tr').children()[4].textContent);
	$("#lentId").val($(this).closest('tr').children()[7].textContent);
	$("#borrowerId").val($(this).closest('tr').children()[8].textContent);
	$("#dateBorrowedId").val($(this).closest('tr').children()[9].textContent);
});

//Items Issue

function toggleDiv() {
	$('#borrowLbl').toggle(200);
	$('#tbodyReturnTable').toggle(200);
	$('#reportTxt').toggle(200);
}


$('#issueBtn').click(function(e) {
	e.preventDefault();
	$.ajax({
		type : "POST",
		url : "/inventory/issues",
		data : $('form#inputIssue').serialize(),
	}).done(function(data) {
		var msg = "";
		if (data != "") {
			$.each(data.errors, function(k, v) {
				msg = msg + v + "\n";
			});

			swal("Oops...", msg, "warning");
		} else {
			swal("Success!", "Report Added!", "success");
			$('form#inputIssue').each(function() {
				this.reset();
				window.location.reload();

			});

		}
	});
});

$("#uniqueIdentifierSearch").keyup(function() {
	_this = this;
	/// Show only matching TR, hide rest of them
	$.each($("#table tr td:#uniqueI"), function() {
		if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
			$(this).hide();
		else
			$(this).show();
	});
});

$('#uniqueSrchIssue').keyup(function() {
	$.ajax({
		type : "GET",
		url : "/inventory/srchUnique",
		data : {
			uniqueSrch : $('#uniqueSrchIssue').val()
		},
	}).done(function(data) {

		var itemData = String(data.itemsTbl['item_type']);
		var modelData = String(data.itemsTbl['model']);
		var brandData = String(data.itemsTbl['brand']);
		var uniqueData = String(data.itemsTbl['unique_identifier']);
		var itemNoData = String(data.itemsTbl['item_no']);

		$('#item').val(itemData);
		$('#model').val(modelData);
		$('#brand').val(brandData);
		$('#itemNo').val(itemNoData);
		$('#unique').val(uniqueData);
		$('#itemNoSrch').val(itemNoData);

	});
});

$("#searchCategory").change(function() {
	$("#selection").removeClass("");

});

$(function() {
	$(".inp").datepicker({
		onSelect : function(dateText, inst) {
			// alert(dateText);
		}
	});
});

$('#itemNoSrchIssue').keyup(function() {

	$.ajax({
		type : "GET",
		url : "/inventory/srchItemNo",
		data : {
			itemNoSrch : $('#itemNoSrchIssue').val()
		},
	}).done(function(data) {

		var itemData = String(data.itemsTbl['item_type']);
		var modelData = String(data.itemsTbl['model']);
		var brandData = String(data.itemsTbl['brand']);
		var uniqueData = String(data.itemsTbl['unique_identifier']);
		var itemNoData = String(data.itemsTbl['item_no']);
		$('#item').val(itemData);
		$('#model').val(modelData);
		$('#brand').val(brandData);
		$('#itemNo').val(itemNoData);
		$('#unique').val(uniqueData);
		$('#uniqueSrch').val(uniqueData);

	});
});

$('a.uniqueLink').click(function(e) {
	
	e.preventDefault();
	var history = $(this).attr('data-id');

	$.ajax({
		type : "GET",
		url : "/inventory/issueHistory",
		data : {
			uniqueI : history
		},

	}).done(function(data) {

		

		var table = '<table><thead><th>Issue</th><th>Date Reported</th><th>Reported by</th><th>Date Repaired</th><th>Updated by</th></thead><tbody>';

		$.each(data, function() {
			table += '<tr><td>' + this['issue'] + '<td>' + this['date_reported'] + '</td><td>' + this['support_on_duty'] + '</td>' + '<td>' + this['date_repaired'] + '</td><td>' + this['updated_by'] + '</td></tr>';
		});
		table += '</tbody></table>';
		$('#me').html("<div>" + table + "</div>");
		//document.getElementById('me').innerHTML = table;
		//$('#datalist').toggle(200);
	});

});

//Status update (issue)
$('.statusLink').on('click', function() {
	$("#myModal1").modal("show");
	$("#statusUpdateId").val($(this).closest('tr').children()[3].textContent);
	$("#currentIssueId").val($(this).closest('tr').children()[7].textContent);
	$('#issueUpdateBtn').click(function() {

		$.ajax({
			type : "POST",
			url : "/inventory/issueStatusUpdate",
			data : $('form#issueUpdate').serialize(),

		}).done(function(data) {

			var msg = "";
			if (data != "") {
				$.each(data.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");
				});

			} else {
				swal("Success!", "Item Status Updated!", "success");
				$('form#issueUpdate').each(function() {
					this.reset();

				});
				window.location.reload();
			}
		});

	});

});

// DataTables

//with Buttons

$('.dataTables-example').DataTable({
	dom : '<"html5buttons"B>',
	buttons : [{
		extend : 'csv'
	}, {
		extend : 'excel',
		title : 'RS Return_returned_logs'
	}, {
		extend : 'pdf',
		title : 'RS Return_returned_logs'
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


@extends('layouts.master')

@section('title', 'SAO | Locker Reports')

@section('header-page')
<div class="col-lg-12">
	<h1>Locker Reports</h1>
</div>

@endsection


@section('content')


<div class="row ">
<div class="col-md-10 col-md-offset-1">
	<div class="table-responsive">

<div class="ibox float-e-margins">
			<div class="ibox-title">

					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover locker-reports-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
									<tr>
									<th>Available</th>
									<th>Occupied</th>
										<th>Damaged</th>
										<th>Locked</th>
									</tr>
						
							</thead>

							

						</table>

					</div>
				</div>
							</div>
									</div>
			</div>
									</div>


<script>
	

/*$('.lost-and-found-reports-DT').DataTable({

	"ajax": {
    	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
    	url : "/locker-reports/reports/list",
		type: "POST",
		data : {month : a},
},
"columns" : [
{data: 'available'},
{data: 'occupied'},
{data: 'lockedd'},
{data: 'damaged'},
	],

	dom : '<"html5buttons"B>Tgtip',
	buttons : [{
		extend : 'csv',
		title : 'Locker Reports',
	}, {
		extend :'excel',
		title : 'Locker Reports',
	} , {
		extend : 'pdf',
		title : 'Locker Reports',
	} , {
		extend : 'print',
		title : 'Locker Reports',
		customize : function(win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '8px').prepend('<label>Text</label>');
			$(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
		}
	}]
});

*/
</script>
@endsection
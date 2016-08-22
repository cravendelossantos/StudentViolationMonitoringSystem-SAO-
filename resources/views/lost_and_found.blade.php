@extends('layouts.master')

@section('title', 'SAO | Lost and Found')

@section('header-page')
<div class="row">
	<div class="col-md-12">
		<h1>Lost and Found</h1>
	</div>
</div>

@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Report Lost Item</h5>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="reportLostItem" method="POST" action="{{route('report.item')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Item Description</label>
								<input type="text" placeholder="Item Description" name="itemName" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Owner's Name,if any</label>
								<input type="text" placeholder="Owner's Name" name="ownerName" class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Endorsed By:</label>
								<input type="text" placeholder="Endorser's name" name="endorserName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Found at</label>
								<input type="text" placeholder="Found at" name="foundedAt" class="form-control">
							</div>
						</div>

						<!--
						<div class="col-md-6">
						<div class="form-group" id="data_1">
						<label class>Disposal Date</label>
						<div class="input-group date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" placeholder="Disposal Date" value="" name="disposalDate" class="form-control">
						</div>
						</div>
						</div>
						-->

					</div>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="lost_and_found_reportBtn" type="button">
					<strong>Save</strong>
				</button>
				<button class="btn btn-w-m btn-danger" id="lost_and_found_cancelBtn" type="button">
					<strong>Cancel</strong>
				</button>
				<input type="hidden" value="{{Session::token()}}" name="_token">
				</form>
			</div>

		</div>

	</div>
</div>

<div class="row">

	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Items List</h5>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">

				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover lost-and-found-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
								<tr>
									<th>Item Description</th>
									<th>Date Endorsed</th>
									<th>Endorsed by</th>
									<th>Founded at</th>
									<th>Owner's Name</th>
									<th>Status</th>
									<th>Date Claimed</th>
									<th>Claimed By</th>

								</tr>
							</thead>
							<tbody id="items">
								@foreach ($lostandfoundTable as $row)
								<tr >

									<td>{{$row->item_description}}</td>
									<td>{{$row->created_at}}</td>
									<td>{{$row->endorser_name}}</td>
									<td>{{$row->founded_at}}</td>
									<td>{{$row->owner_name}}</td>
									<td>{{$row->status}}</td>
									<td>{{$row->date_claimed}}</td>
									<td>{{$row->owner_name}}</td>

								</tr>
								@endforeach
							</tbody>

							<tfoot>
								<tr>
									<th>Item Description</th>
									<th>Date Endorsed</th>
									<th>Endorsed by</th>
									<th>Founded at</th>
									<th>Owner's Name</th>
									<th>Status</th>
									<th>Date Claimed</th>
									<th>Claimed By</th>

								</tr>
							</tfoot>
						</table>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script>
	$('button#lost_and_found_reportBtn').click(function(e) {

		e.preventDefault();
	
		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "POST",
			url : "/lost_and_found/report_item",
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
				console.log(data);
		

				swal('Success!', 'Item reported', 'success');

				if (data.response['owner_name'] == null)
				{
				var html = "<tr><td>" + data.response['item_description'] + "</td>"	+
							"<td>" + data.response['created_at'] + "</td>"	+
								"<td>" + data.response['endorsed_by'] + "</td>"	+
							"<td>" + data.response['founded_at'] + "</td>" +
							"<td></td>"	+
							"<td>" + data.response['status'] + "</td>" + 
							"<td></td>" +
							"<td></td></tr>";
							
				$('tbody#items').prepend(html);
				}
				else
				{
					var html = "<tr><td>" + data.response['item_description'] + "</td>"	+
							"<td>" + data.response['created_at'] + "</td>"	+
							"<td>" + data.response['endorsed_by'] + "</td>"	+
							"<td>" + data.response['founded_at'] + "</td>" +
							"<td>" + data.response['owner_name'] + "</td>"	+
							"<td>" + data.response['status'] + "</td>" + 
							"<td></td>" +
							"<td></td></tr>";
							
				$('tbody#items').prepend(html);
				}

			}
		});

	});

	$('button#lost_and_found_cancelBtn').click(function() {
		$('form#reportLostItem').each(function() {
			this.reset();
		});
	}); 
</script>
@endsection


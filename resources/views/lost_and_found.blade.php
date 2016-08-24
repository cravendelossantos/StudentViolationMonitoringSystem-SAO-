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

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Claim Item</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic">
					{!! csrf_field() !!}

					<div class="form-group claimItem">
						<label class="col-md-2 control-label">Item:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="itemDescription">
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

				</form>

			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" type="button">
					<strong>Save</strong>
				</button>
				<button type="button" class="btn btn-w-m btn-danger"
				data-dismiss="modal">
					<strong>Cancel</strong>
				</button>
			</div>
		</div>

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Report Lost Item</h5>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="reportLostItem" method="POST" action="{{ route('report.item') }}">
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
								<label>Endorsed by</label>
								<input type="text" placeholder="Endorser's name" name="endorserName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Found at</label>
								<input type="text" placeholder="Found at" name="foundedAt" class="form-control">
							</div>
						</div>

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

					<div class="input-group col-lg-offset-8 col-lg-4">

						<input type="text" class="form-control" id="searchBox" name="searchBox" placeholder="Search for something">
						<span class="input-group-btn">
							<button type="button" id="" class="btn btn-primary searchBtn">
								Go!
						</span>
						</button>
					</div>

				</div>

			</div>

			<div class="ibox-content" id="table-content">
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
									@if ($row->status == 'Unclaimed')
									<td ><a href="#" style="color:red" name="" id="{{$row->id}}" data-toggle="modal" data-target="#myModal">{{$row->status}}</a></td>
									@elseif ($row->status == 'Claimed')
									<td s><a href="#" style="color:green" id="{{$row->id}}">{{$row->status}}</a></td>
									@elseif ($row->status == 'Donated')
									<td s><a href="#" style="color:blue" id="{{$row->id}}">{{$row->status}}</a></td>
									@endif
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
			url : "/lost-and-found/report-item",
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
				$("#table-content").fadeTo("slow", 0.3);

				swal('Success!', 'Item reported', 'success');

				if (data.response['owner_name'] == null) {

					$("#table-content").load("/lost-and-found/table/load").fadeTo("slow", 1);

				} else {

					$("#table-content").load("/lost-and-found/table/load").fadeTo("slow", 1);

				}

			}
		});

	});

	$('button.searchBtn').click(function(e) {
		e.preventDefault();
		//var item = $('input#searchBox')
		$.ajax({
			headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
			type : "GET",
			url : "/lost-and-found/search",
			data : $('input#searchBox').serialize(),

		}).done(function(data) {

			$("#table-content").load("/lost-and-found/table/load");
		});
	});

	$('button#lost_and_found_cancelBtn').click(function() {
		$('form#reportLostItem').each(function() {
			this.reset();
		});
	}); 
	
	
	
 
</script>

@endsection


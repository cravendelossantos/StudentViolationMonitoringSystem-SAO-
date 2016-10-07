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

<div id="LAF_Modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Claim Item</h4>
			</div>

			<div class="ibox-content">
				<form class="form-horizontal suggestTopic" id="claim_item">
					{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="claim_id" id="claim_id">


					<div class="form-group claimItem">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Date Endorsed</label>
							<output class="form-control" name="date_endorsed" id="date_endorsed"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>


					<div class="form-group claimItem">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Item</label>
							<output class="form-control" name="item_description" id="item_description"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

					<div class="form-group claimItem">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Owner Name</label>
							<output class="form-control" name="owner_name" id="owner_name"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>


					<div class="form-group claimItem">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Endorsed by</label>
							<output class="form-control" name="endorser_name" id="endorser_name"></output>
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>


					<div class="form-group claimItem">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Claimer Name</label>
								<input type="text" placeholder="Claimer Name" name="claimer_name" id="claimer_name" class="form-control">

							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div>

	
							
			</div>

			<div class="modal-footer">
				<button class="ladda-button btn btn-w-m btn-primary claimItem" id="claim_btn" type="button">
					<strong>Claim</strong>
				</button>
				<button type="button" class="btn btn-w-m btn-danger"
				data-dismiss="modal">
					<strong>Cancel</strong>
				</button>
				</form>
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

				<form role="form" id="reportLostItem">
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

				
				
				</div>

			</div>


			<div class="ibox-content" id="table-content">
												<div class="form-group">
				Filter
				<select id="sort_by" name="sort_by"  class="form-control">
					<option>All</option>
					<option>Unclaimed</option>
					<option>Claimed</option>
					<option>Donated</option>
				</select>


</div>

				<div class="table-responsive">



					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover lost-and-found-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
				<tr><th colspan="10"><center>Claiming Period: Within 60 days from the date of endorsement to SAO</center></th></tr>
				<tr>
									<th>Date Endorsed</th>
									<th>Item Description</th>
									<th>Endorsed by</th>
									<th>Founded at</th>
									<th>Owner's Name</th>
									<th>Status</th>
									<th>Date Claimed</th>
									<th>Claimed By</th>

					</tr>	
							</thead>

							

						</table>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection


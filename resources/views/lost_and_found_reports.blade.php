@extends('layouts.master')

@section('title', 'SAO | Lost and Found Reports')

@section('header-page')
<div class="row">
<div class="col-md-12">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>
</div>

@endsection


@section('content')

<div class="animated fadeInLeft">

<div class="col-md-12">

<div class="ibox-title">
<label>Generate Reports</label>

</div>
<div class="ibox-content">

{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">



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



						<table class="table table-striped table-bordered table-hover lost-and-found-reports-DT DataTable" id="asd" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>

									<th>Date Endorsed</th>
									<th>Item Description</th>
									<th>Endorsed by</th>
									<th>Founded at</th>
									<th>Owner's Name</th>
									<th>Status</th>
									<th>Date Claimed</th>
									<th>Claimed By</th>

						
							</thead>

							

						</table>

					</div>
				</div>
							</div>

<div class="ibox-footer">


</div>

				</div>
				</div>
@endsection


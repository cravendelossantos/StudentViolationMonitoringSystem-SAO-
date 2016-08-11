@extends('layouts.master')

@section('title', 'SAO | Lost and Found')

@section('header-page')
<div class="col-md-12">
	<h1>Lost and Found</h1>
</div>

@endsection

@section('menu')
<li >
	<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

</li>
<li ui-sref-active="active" class="active">
	<a href="/ReportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Reports</span> </a>
</li>

<li ui-sref-active="active">
	<a href="/CommunityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
</li>

<li ui-sref-active="active">
	<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
</li>

<li ui-sref-active="active">
	<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Reports</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li>
			<a href="">Third Level <span class="fa arrow"></span></a>
			<ul class="nav nav-third-level collapse">
				<li>
					<a href="">Third Level Item</a>
				</li>
				<li>
					<a href="">Third Level Item</a>
				</li>
				<li>
					<a href="">Third Level Item</a>
				</li>

			</ul>
		</li>
		<li>
			<a href="">Second Level Item</a>
		</li>
		<li>
			<a href="">Second Level Item</a>
		</li>
		<li>
			<a href="">Second Level Item</a>
		</li>
	</ul>
</li>
@endsection

@section('content')

<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Add  new  lost item</h5>
				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="addItemForm" method="POST" action="/lostandfoundAdd">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Item</label>
								<input type="text" placeholder="Item Description" name="itemName" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

			
						<div class="col-md-6">
							<div class="form-group">
								<label>Endorsed By:</label>
								<input type="text" placeholder="Endorser name" name="endorserName" class="form-control">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group" id="data_1">
								<label>Date endorsed to Student Affair's Office:</label>
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control" name="dateEndorsed" placeholder="Pick Date" >
								</div>
							</div>
						</div>
					</div>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="addItemBtn" type="submit">
					<strong>Add</strong>
				</button>
				</form>
			</div>

		</div>
		
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Claim lost item</h5>
				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="addItemForm" method="POST" action="/lostandfoundUpdate">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Item</label>
									<select class="form-control" name="itemSelection">
									<option autofocus="" disabled selected >Select Item</option>
									@foreach ($lostandfoundTable as $row)
									<option>{{$row->item}}</option>
									@endforeach
								</select>
							</div>
						</div>

			
						<div class="col-md-6">
							<div class="form-group">
								<label>Claimed By:</label>
								<input type="text" placeholder="Endorser name" name="claimerName" class="form-control">
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group" id="data_1">
								<label>Date Claimed:</label>
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control" name="dateClaimed" placeholder="Pick Date" >
								</div>
							</div>
						</div>
					</div>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="addItemBtn" type="submit">
					<strong>Claim</strong>
				</button>
				</form>
			</div>

		</div>


		<div class="ibox">
			<div class="ibox float-e-margins">

				<div class="ibox-title">
					<h5>List</h5>
					<div class="ibox-tools">
						<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
						<a class="close-link"> <i class="fa fa-times"></i> </a>
					</div>
				</div>

				<div class="ibox-content">

					<div class="table-responsive">

						<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
								<tr>
									<th>Item</th>
									<th>Date Endorsed</th>
									<th>Endorsed by</th>
									<th>Date Claimed</th>
									<th>Claimed By</th>
									<th>Status</th>	

								</tr>
							</thead>
							<tbody  id="tbody">
							@foreach ($lostandfoundTable as $row)
								<tr >
									<td style="display: none">{{$row->id}}</td>
									<td>{{$row->item}}</td>
									<td>{{$row->date_endorsed}}</td>
									<td>{{$row->endorser_name}}</td>
									<td>{{$row->date_claimed}}</td>
									<td>{{$row->claimer_name}}</td>
									<td>{{$row->status}}</td>

								</tr>
							@endforeach
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


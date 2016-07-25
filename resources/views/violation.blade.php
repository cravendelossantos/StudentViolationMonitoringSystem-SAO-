@extends('layouts.master')

@section('title', 'SAO | Violations')

@section('header-page')
<div class="col-md-12">
	<h1>Violations</h1>
</div>

@endsection

@section('menu')
<li ui-sref-active="active">
	<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

</li>
<li ui-sref-active="active" >
	<a href="/ReportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Report a violation</span> </a>
</li>

<li ui-sref-active="active">
	<a href="/CommunityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
</li>

<li ui-sref-active="active" class="active">
	<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
</li>

<li ui-sref-active="active" >
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
				<h5>Add violation</h5>
				<div class="ibox-tools">
					<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
					<a class="close-link"> <i class="fa fa-times"></i> </a>
				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="addItemForm" method="POST">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>Violation ID No.</label>
								<input type="text" placeholder="Violation ID. No." name="violationNo" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label> Offense Level</label>
								<!--	<input type="text" placeholder="Company" name="" class="form-control" name="">-->
								<select class="form-control" name="violationlevelSelection">
									<option autofocus="" disabled selected > Less Serious</option>
									<option>Minor</option>
									<option>Major</option>

								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Violation Name</label>
								<input type="text" placeholder="Violation name" name="violationName" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Description</label>
								<input type="text" placeholder="Description" name="Description" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Sanction</label>
								<input type="text" placeholder="Sanction" name="Sanction" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" id="data_1">
								<label>Date Added</label>
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" class="form-control" name="date" placeholder="Pick Date" >
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>

			<div class="ibox-footer">
				<button class="btn btn-w-m btn-primary" id="addItemBtn" type="button">
					<strong>Add</strong>
				</button>

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
										<th>Violation ID No.</th>
										<th>Violation Name</th>
										<th>Offense Level</th>
										<th>Description</th>
										<th>Sanction</th>										
										<th>Date</th>

									</tr>
								</thead>
								<tbody  id="tbody">

									<tr >
										<td>0001</td>
										<td>Smoking</td>
										<td>Major</td>
										<td>Smoking inside/outside the campus </td>
										<td>1 month suspended</td>
										<td>7/7/2016</td>

									</tr>

								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


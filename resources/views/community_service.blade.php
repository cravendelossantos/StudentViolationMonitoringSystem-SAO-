@extends('layouts.master')

@section('title', 'SAO | Community Service')

@section('header-page')
<div class="col-md-12">
	<h1>Community Service</h1>
</div>

@endsection

@section('menu')
<li ui-sref-active="active">
	<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

</li>
<li ui-sref-active="active" >
	<a href="/ReportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Reports</span> </a>
</li>

<li ui-sref-active="active" class="active" >
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



			<div class="ibox">
				<div class="ibox float-e-margins">

					<div class="ibox-title">
						<h5>List of students having commmunity service</h5>
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
										<th>Student No.</th>
										<th>Name</th>
										<th>Violation</th>
										<th>Year / Course</th>
										<th>Date</th>

									</tr>
								</thead>
								<tbody  id="tbody">

									<tr >
										<td>2016-0000</td>
										<td>Elmar "Jimboy" Anchuelo</td>
										<td>Umihi sa Pond</td>
										<td>4th Year / BSIT</td>
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


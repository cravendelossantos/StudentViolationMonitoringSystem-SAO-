@extends('layouts.master')

@section('title', 'SAO | Home')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome!</h1>
</div>

@endsection

@section('menu')
<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding" > Students Violation Management</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li ui-sref-active="active">
			<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

		</li>
		<li ui-sref-active="active" >
			<a href="/reportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Report a violation</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/communityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
		</li>

		<li ui-sref-active="active" >
			<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
		</li>
	</ul>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Lockers Management</span><span class="fa arrow"></span></a>
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

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Lost and Found</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li ui-sref-active="active">
			<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

		</li>
		<li ui-sref-active="active" >
			<a href="/lostandfound"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Add Item</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/communityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
		</li>

		<li ui-sref-active="active" >
			<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
		</li>
	</ul>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Campus Venue Rservation Monitoring</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li ui-sref-active="active">
			<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

		</li>
		<li ui-sref-active="active" >
			<a href="/reportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Report a violation</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/communityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
		</li>

		<li ui-sref-active="active" >
			<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
		</li>
	</ul>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Monitoring of Proposal of Activities</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li ui-sref-active="active">
			<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

		</li>
		<li ui-sref-active="active" >
			<a href="/reportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Report a violation</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/communityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
		</li>

		<li ui-sref-active="active" >
			<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
		</li>
	</ul>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Organizations Renewal Management</span><span class="fa arrow"></span></a>
	<ul class="nav nav-second-level collapse">
		<li ui-sref-active="active">
			<a href="/index"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

		</li>
		<li ui-sref-active="active" >
			<a href="/reportViolation"><i class="fa fa-diamond"></i> <span class="nav-label ng-binding">Report a violation</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/communityService"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Community Service</span> </a>
		</li>

		<li ui-sref-active="active">
			<a href="/violation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Violation</span> </a>
		</li>

		<li ui-sref-active="active" >
			<a href="/sanctions"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Sanctions Monitoring</span> </a>
		</li>
	</ul>
</li>
@endsection

@section('content')

@endsection


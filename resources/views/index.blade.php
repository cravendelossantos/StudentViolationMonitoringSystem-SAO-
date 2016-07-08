@extends('layouts.master')

@section('title', 'Student Affairs Office')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome!</h1>
</div>

@endsection

@section('menu')

<li class="active">
	<a href="index" id="me"><i class="fa fa-th-large"></i> <span class="nav-label ng-binding">Dashboard</span> </a>

</li>

<li ui-sref-active="active">
	<a href="ReportViolation"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label ng-binding">Reports</span> </a>
</li>

<li>
	<a href=""><i class="fa fa-sitemap"></i> <span class="nav-label ng-binding">Menu levels</span><span class="fa arrow"></span></a>
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

@endsection


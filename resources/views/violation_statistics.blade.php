@extends('layouts.master')

@section('title', 'SAO | Violation Statistics')

@section('header-page')
<div class="col-md-12">
	<h1>Violation Statistics</h1>
</div>

@endsection
		<script src="/js/demo/app-flot.js"></script>
		<script src="/js/demo/flot-demo2.js"></script>

@section('content')

<div class="row">
	<div class="col-lg-12 animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">

				<div class="">
					<div class="form-group">
						<label>Sort by:</label>

						<input type="radio" name="sort" value="year">
						Year
						<input type="radio" name="sort" value="college">
						College
						<input type="radio" name="sort" value="course">
						Course

						<select class="form-control" id="violation_selection" name="violation">
							<option autofocus="" disabled selected >Per College</option>
							<option>COECSA</option>
							<option>CAMS</option>
							<option>CBA</option>
							<option>CITHM</option>
							<option>CAS</option>
						</select>

					</div>
				</div>
				<div class="hr-line-solid"></div>
			</div>

			<div class="ibox-content">

				<div class="flot-chart">
					<div class="flot-chart-content" id="flot-bar-chart"></div>
				</div>

			</div>

			<div class="ibox-footer">

			</div>
		</div>
	</div>
</div>

<script src="/js/demo/app-flot.js"></script>
<script src="/js/demo/flot-demo2.js"></script>


@endsection


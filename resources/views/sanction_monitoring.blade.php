@extends('layouts.master')

@section('title', 'SAO | Sanction Monitoring')

@section('header-page')
<div class="row">
<div class="col-md-12">
	<h1>Sanction Monitoring</h1>
</div>
</div>	
@endsection


@section('content')




					{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="row">


<div class="col-md-8">
				<div class="ibox float-e-margins">

					<div class="ibox-title">
						<h5>List</h5>
						<div class="ibox-tools">
						<!-- 	<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
							<a class="close-link"> <i class="fa fa-times"></i> </a> -->
						</div>
					</div>

					<div class="ibox-content">

										<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

						<table class="table table-striped table-bordered table-hover sanctions-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
							<thead>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Sanction</th>
									<th>Sanction</th>	
								 	<th>Sanction</th>
								 	<th>Sanction</th>

				
							</thead>

		

						</table>
						</div>
					</div>
					</div>
				</div>
			</div>

						</div>






@endsection



<script>
	

</script>
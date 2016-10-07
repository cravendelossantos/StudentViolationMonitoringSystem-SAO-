@extends('layouts.master')

@section('title', 'SAO | Student Records')

@section('header-page')
<div class="row">
<div class="col-lg-12">
	<h1>Import/Export Student Records</h1>
</div>
</div>
@endsection




@section('content')





<div class="row animated fadeInRight">
<div class="col-md-12">
		<div class="ibox float-e-margins">
<div class="ibox-content">

		  <div class="panel-body">

		  		@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('success') }}
					</div>
				@endif

				@if ($message = Session::get('error'))
					<div class="alert alert-danger" role="alert">
						{{ Session::get('error') }}
					</div>
				@endif

				<h3>Import File Form:</h3>
				<form action="{{ URL::to('/student-records/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

					<input type="file" name="import_file" id="import_file" />
					{{ csrf_field() }}
					<br/>

					<button class="btn btn-primary" id="s_import_btn">Import CSV or Excel File</button>

				</form>
				<br/>

		    	
		    	<h3>Export File From Student Records Database:</h3>
		    	<div> 		
			   <!--  	<a href="{{ url('/violation-records/downloadExcel/xls') }}"><button class="btn btn-w-m btn-info">Download Excel xls</button></a>
					<a href="{{ url('/violation-records/downloadExcel/xlsx') }}"><button class="btn btn-w-m btn-info">Download Excel xlsx</button></a> -->
					<a href="{{ url('/student-records/downloadExcel/csv') }}"><button class="btn btn-w-m btn-info">Download Excel File</button></a>
		    	</div>
  </div>

    </div>

		  </div>
		      	</div>
     	</div>

<div class="row animated fadeInRight">
<div class="col-md-12">
		<div class="ibox float-e-margins">
<div class="ibox-content">
<h2>Students List</h2>


    			<div class="table-responsive">



					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">



						<table class="table table-striped table-bordered table-hover student-records-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">

							<thead>
				
				<tr>
									<th>Student No</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Course</th>
									<th>Year</th>
									<th>Contact no</th>
							

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

<script>
	

</script>
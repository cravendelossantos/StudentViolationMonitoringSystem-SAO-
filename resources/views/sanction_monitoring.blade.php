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
                <div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">




		<div class="ibox-content">


					<div class="row">
                        <div class="col-md-6">

                        <label>Enter Student Number</label>
                    <div class="input-group">
                   	 
                    <input type="text" name="cs_student_no" class="form-control"> <span class="input-group-btn"> <button type="button" id="CS_find_student" class="btn btn-primary">Find
                                        </button> </span></div>
                            
                                        </div>
</div>
                    <div class="panel blank-panel">

                        <div class="panel-heading">



                            <div class="panel-title m-b-md">
                          

                          	</div>
                            <div class="panel-options">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1">Sanctions</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2">Community Service</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3">Suspensions</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<table class="table table-striped table-bordered table-hover sanctions-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
								<thead>

									<th>Date Committed</th>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Offense Number</th>
									<th>Course</th>

								</thead>

							</table>
						</div>
					</div>
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    <div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<table class="table table-striped table-bordered table-hover CS-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
								<thead>

									<th>Date Committed</th>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Offense Number</th>
									<th>Course</th>

								</thead>

							</table>
						</div>
					</div>
                                </div>


          <div id="tab-3" class="tab-pane">
                                    <div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

							<table class="table table-striped table-bordered table-hover suspensions-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
								<thead>

									<th>Date Committed</th>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Violation</th>
									<th>Offense Number</th>
									<th>Course</th>

								</thead>

							</table>
						</div>
					</div>
                                </div>







                            </div>

                        </div>

                    </div>
                </div>
                          </div>

                    </div>
                </div>





@endsection



<script>
	

</script>
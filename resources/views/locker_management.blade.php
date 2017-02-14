@extends('layouts.master')

@section('title', 'SAO | Locker Management')

@section('header-page')
<div class="row col-lg-12">
	<h1>Locker Assignment</h1>
</div>

@endsection


@section('content')


<div id="lockers_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-md">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title">Update Locker</h4>
				
			</div>

			<div class="ibox-content">
				<form class="form-horizontal" id="locker_status_update" > 
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="text-center">	<p>Current Status:
						<strong><output name="m_current_status" id="m_current_status">
						</output></strong></p></div>

						<div class="form-group">

							<div class="col-md-10 col-md-offset-1">
								<label class="control-label">Locker no</label>
								<input type="hidden" name="_m_locker_no" id="_m_locker_no">
								<output class="form-control" name="m_locker_no" id="m_locker_no"></output>
								<span class="help-block m-b-none text-danger"></span>
							</div>

						</div>


				<!-- 	<div class="form-group">
						
						<div class="col-md-10 col-md-offset-1">
						<label class="control-label">Location</label>
							<input class="form-control" name="m_location" id="m_location">
							<span class="help-block m-b-none text-danger"></span>
						</div>

					</div> -->

					<div class="form-group">

						<div class="col-md-10 col-md-offset-1">

							<label class="control-label">Update status</label><br>
							<select class="form-control" name="m_update_status" id="m_update_status">
								<option disabled="" selected="">Update Status</option>
								<option value="Available">Available</option>
								<option value="Occupied">Occupied</option>
								<option value="Damaged">Damaged</option>
								<option value="Locked">Locked</option>

							</select>
							
							<br>
							<div id="occupancy_div">		
								<div>
									<input type="text" class="form-control" placeholder="Name of Lessee" name="m_lessee_name" id="m_lessee_name" style="text-transform: capitalize;">
								</div>
								<br>
								<div>
									<input type="text" class="form-control" placeholder="Lessee ID No." name="m_lessee_id" id="m_lessee_id">
								</div>
								<br>
								<select class="form-control" name="contract" id="contract">

									<option disabled="" selected="">Select Contract</option>
									@foreach ( $dates as $date )
									<option value="{{ $date->id }}">{{ $date->term_name }} ( S.Y - {{ $date->school_year }})</option>
									@endforeach
								</select>

								<span class="help-block m-b-none text-danger"></span>
							</div>
						</div>
					</div>





				</div>

				<div class="modal-footer">
					<button class="ladda-button btn btn-w-m btn-primary claimItem" id="locker_update" type="button">
						<strong>Save</strong>
					</button>
					<button type="button" class="btn btn-w-m btn-danger"
					data-dismiss="modal">
					<strong>Cancel</strong>
				</button>
			</form>
		</div>
	</div>

</div>
</div>


<!-- 
<div class="row" id="contract_content">
	<div class="col-md-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
			<form method="POST" action="/saved" id="cms-form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<textarea name="contract-details" id="contract-details"></textarea>
				<button type="submit">save</button>
			</form>
			</div>
		</div>
	</div>
</div>
 -->

<div id="locker_contract" style="">
	<div class="ibox float-e-margins">
		<div class="ibox-content">
			<textarea>{!! $content->value !!}</textarea>
		</div>
	</div>
</div>
<!-- <div id="locker_contract">
<div class="ibox float-e-margins">
	<div class="ibox-title">

		<h5><b>Locker Contract</b></h5>


		<button type="button" class="btn btn-primary btn-xs m-l-sm pull-right" id="print">Print</button>
		<button id="save" class="btn btn-primary  btn-xs m-l-sm pull-right" onclick="save()" type="button">Save</button>
		<button id="edit" class="btn btn-primary btn-xs m-l-sm pull-right" onclick="edit()" type="button">Edit</button>

	</div>
</div>

</div> -->



<div class="row">

	<div class="col-lg-12">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Add Lockers</h5>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">

				<form role="form" id="add_locker_form" method="POST" action="/lockers/add">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label>No of lockers</label>
								<input type="number" placeholder="No of Lockers" name="no_of_lockers" id="no_of_lockers" class="form-control" autofocus="" aria-required="true">
							</div>
						</div>

						<div class="col-md-6">


							<div class="form-group">
									<!-- <label>Building</label>

									<select name="location" id="location" class="form-control">
									<option>JPL</option>
									<option>SHL</option>
									<option>New</option>
								</select> -->
								

								<label>Location</label>
								<select name="location" id="location" class="form-control">
									<option selected="" disabled="">Select Location</option>
									@foreach($locations as $location)

									<option value="{{ $location->id }}">{{ $location->building }} Building {{ $location->floor }} Floor </option>
									@endforeach
								</select>


							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group ">
								<label>Locker number</label>
								<input type="number" placeholder="From" name="from" id="from" class="form-control" autofocus="" aria-required="true">
							</div>
							<div class="form-group ">
								<input type="number" placeholder="To" name="to" id="to" class="form-control" autofocus="" aria-required="true" readonly="">
							</div>
						</div>






						


					</div>

				</div>

				<div class="ibox-footer">
					<button class="btn btn-w-m btn-primary" id="add_locker_btn" type="button">
						<strong>Save</strong>
					</button>
					<button class="btn btn-w-m btn-danger" id="add_locker_cancelBtn" type="button">
						<strong>Cancel</strong>
					</button>
					<input type="hidden" value="{{Session::token()}}" name="_token">
				</form>
			</div>

		</div>

	</div>
</div>


<div class="row ">
	<div class="col-lg-12">

		<div class="ibox">
			<div class="ibox float-e-margins">

				<div class="ibox-title">
					<h3>Filter:</h3>
					<div class="row">
						<div class="form-group">

							<div class="col-md-6">

								<label>Status</label>
								<select id="status_sort" name="status_sort"  class="form-control">
									<option value="">All</option>
									<option value="Available">Available</option>
									<option value="Occupied">Occupied</option>
									<option value="Damaged">Damaged</option>
									<option value="Locked">Locked</option>
								</select>
							</div>
							<div class="col-md-6">
								<label>Location</label>
								<select name="location_sort" id="location_sort" class="form-control">
									<option value="">All</option>
									@foreach($locations as $location)

									<option value="{{ $location->id }}">{{ $location->building }} Building {{ $location->floor }} Floor </option>
									@endforeach
								</select>
							</div>

						</div>

					</div>

					<div class="ibox-content" id="table-content">
						<div class="table-responsive">
							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

								<table class="table table-striped table-bordered table-hover lockers-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid" style="width: 100%;">
									<thead>

										<th>Locker no</th>
										<th>Floor</th>
										<th>Building</th>
										<th>Lessee</th>
										<th>Status</th>




									</thead>



								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	




	<script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
	<script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>


	<script src="js/plugins/summernote/summernote.min.js"></script>
	<script>

		$(document).ready(function(){ 

		tinymce.init({
			selector: "textarea",
			plugins: [
				"advlist lists textcolor colorpicker autoresize print",
			],
			toolbar: [ "print | undo redo | styleselect | fontselect | forecolor | fontsizeselect",
				"bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist",
			],
			fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 40pt',
			menubar: 'file'
		});

		});
		
        //$('#locker_contract').hide();

        $('#print').click(function(e){
        	$(this).hide();
        	var content = document.getElementById('contract_content').innerHTML;
        	document.body.innerHTML = content;

        	window.print();
        	window.location.reload();


        	e.preventDefault();
        });
    </script>

    <style>
    	
    	.locker-damaged{
    		height: 120px;
    		width: 75px;
    		margin-left: 20px;
    		background-color: red;
    	}


    	.locker-available{
    		height: 120px;
    		width: 75px;
    		margin-left: 20px;
    		background-color: green;
    	}

    	.locker-occupied{
    		height: 120px;
    		width: 75px;
    		margin-left: 20px;
    		background-color: blue;
    	}

    	.text-line {
    		background-color: transparent;
    		width: 230px;
    		color: black;
    		outline: none;
    		outline-style: none;
    		border-top: none;
    		border-left: none;
    		border-right: none;
    		border-bottom: solid #eeeeee 1px;
    		padding: 3px 10px;
    	}



    	.note-codable {
    		display:none;
    	}
    	.note-help {
    		display:none;
    	}
    	.note-insert {
    		display:none;
    	}
    	.note-view {
    		display:none;
    	}


    	.note-toolbar {
    		/*background-color: white;*/
/*position: absolute;
    bottom: 330px;
    right: 200px;*/
    /*padding-left: 30px;*/
    padding-bottom: 30px;
    /*border-bottom:1px solid #a9a9a9*/
}

</style>
@endsection
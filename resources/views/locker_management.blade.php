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

<div id="locker_contract">
<div class="ibox float-e-margins">
	<div class="ibox-title">

		<h5><b>Locker Contract</b></h5>


		<button type="button" class="btn btn-primary btn-xs m-l-sm pull-right" id="print">Print</button>
		<button id="save" class="btn btn-primary  btn-xs m-l-sm pull-right" onclick="save()" type="button">Save</button>
		<button id="edit" class="btn btn-primary btn-xs m-l-sm pull-right" onclick="edit()" type="button">Edit</button>

	</div>
</div>

</div>

<div class="row" id="contract_content">

	<div class="col-md-9 col-md-offset-2">
		<div class="click2edit">



			<div class="ibox float-e-margins">
				<div class="ibox-content p-xl">
					<div class="row">
					<b>F-SAO-004 (Copy)
					<br>
					
					</div>
					
					<div class="row">
						<div class="col-sm-12 text-center">
							LYCEUM OF THE PHILIPPINES UNIVERSITY
							<br>
							Cavite Campus</b>
							<br>
							Gen. Trias, Cavite
						</div>
					</div>


					<div class="row">

						<br><br>
						<div class="col-sm-12 text-center">
							<h5>STUDENT AFFAIRS OFFICE</h5>
							<h5><u>LOCKER CONTRACT</u></h5>


						</div>


						<br>
					</div>


					<div class="row" style="">
						<form>
						<center>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Manila
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Makati
							</label>
							<label class="checkbox-inline">
								<input type="checkbox" value="">Cavite
							</label>
							</center>
						</form>
						
					</div>
					<br>
					<div class="row text-center" style="">

					<p style="text-align: justify;">I _______________________________,__________________________ would like to rent one (1) locker unit on a<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Name of Student)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Course &amp; Year)<br>
					( ) semestral ( ) yearly basis.<br><br>
					I hereby agree to the following <i>terms and conditions:</i><br><br>

					<ol type="1" style="text-align: justify; ">
					<center>
						<li>
						<p style="text-align: justify;">I will pay the locker rental fee of ( ) two hundred pesos (P200) per semester / ( ) three hundred and fifty<br>
						pesos (P350) per school year. In case I discontinue its use, it is understood that the rental fee is non-<br>
						transferable and non-refundable.</p>
						</li>

						<li>
						<p style="text-align: justify;">The locker unit assigned to me is in good state. I am therefore responsible for any damage, which may<br>
						result from my negligence, deliberate destruction, vandalism or acts that I may be found to be at fault.<br>
						Likewise, I am willing to abide the school's regulations against vandalism and destruction of school<br>
						properties.</p>
						</li>
						
						<li  style="text-align: justify;">
						<p>I hereby acknowledge that any loss or property inside the rented locker unit is not the responsibility of<br>
						the school. I shall provide the lock for the unit I am to occupy for its security. However, if an incident of<br>
						loss occurs, I will inform the Student Affairs Office immediately so that proper investigation may be<br>
						conducted.</p>
						</li>

						<li>
							<p style="text-align: justify;">I will maintain the cleanliness and orderliness of my locker.</p>

						</li>


						<li>
							<p style="text-align: justify;">I am to occupy only the unit designated to me. I will not switch my locker unless authorized by the<br>
							Student Affairs Office.</p>
						</li>

						<li>
							<p style="text-align: justify;">I will notify the Student Affairs Office immediately if I decide to discontinue the use of the locker unit<br>
							assigned to me.</p>

						</li>

						<li>
							<p style="text-align: justify;">Upon the expiration of this agreement, I agree completely and unconditionally to vacate the<br>
							aforementioned unit without necessity of demand. Otherwise, my rented locker will be forced open and<br>
							my personal belongings will be confiscated.</p>

						</li>

						<li>
							<p style="text-align: justify;">Failure on my part to comply with ant of the <u><i><b>terms and conditions</b></i></u> stated herein may result in the<br>
							termination of the contract even before the expiration date.</p>

						</li>

						<li>
							<p style="text-align: justify;">The terms of this agreement will be for the _________________, terminating on___________.<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Sem. / SY)</p>
						</li>

						</center>
					</ol>

					</div>


	<!-- 			<div class="pull-right">	
					<div class="row">
						<div class="col-md-offset-6">
							<p>Conforme: ______________<br>
							(Signature over printed name)</p>
						</div>
					</div>
				</div>
				<div class="">
					<div class="row">
						<div class="col-md-6">
						Home Address___________________________________________________________________
						</div>
						<div class="col-md-6">
						Locker No. _____________________________________________________
						</div>
					</div>
				</div>		
 -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>

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

								<table class="table table-striped table-bordered table-hover lockers-DT dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
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







	<script src="js/plugins/summernote/summernote.min.js"></script>
	<script>

		$(document).ready(function(){

			$('.summernote').summernote();

		});
		var edit = function() {
			$('.click2edit').summernote({focus: true});
		};
		var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

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
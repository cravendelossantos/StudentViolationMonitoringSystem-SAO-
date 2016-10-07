@extends('layouts.master')

@section('title', 'SAO | Locker Locations')

@section('header-page')
<div class="col-lg-10">
	<h1>Add Locker Locations</h1>
</div>

@endsection


@section('content')


<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">
		

		<div class="ibox-content">
		<form id="new_locker_location">
						{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
		
			<label>Building Name</label>
			<input type="text" class="form-control" name="new_building" id="new_building" placeholder="Enter new building name" style="text-transform: capitalize;"> 

			

					</div>


	

				<div class="form-group">
		
			<label>Floor</label>
				<select name="floor_selection"  id="floor_selection" class="form-control">
				<option disabled="" selected="">Select a floor</option>
				<option value="1st" >1st</option>
				<option value="2nd" >2nd</option>
				<option value="3rd" >3rd</option>
				<option value="4th" >4th</option>
				<option value="5th" >5th</option>

				</select>
			</div>


			<button type="button" class="button btn btn-w-m btn-primary" id="new_locker_location_btn">Save </button>
		</form>
		</div>

		</div>
	</div>
</div>	






<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">
		

		<div class="ibox-content">
		<div class="table-responsive">
<table class="table table-striped">

		        <thead>
        <th>Building</th>
		<th>Floor</th>
        </thead>

        <tbody>

        @foreach ($locations as $location)
        <tr>
        	<td>{{ $location->building }}</td>		
        	<td>{{ $location->floor }}</td>
        </tr>

        @endforeach

    </tbody>
    </table>

	</div>

		</div>
</div>

</div>
</div>


<script>
	





$('#new_locker_location_btn').click(function(e){
	e.preventDefault();

	$.ajax({
	headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
			},
		url  : '/settings/locker-locations/add',
		type : 'GET',
		data : $('form#new_locker_location').serialize(),
	}).fail(function(data){

		 var errors = $.parseJSON(data.responseText);
				var msg="";
				
				$.each(errors.errors, function(k, v) {
					msg = msg + v + "\n";
					swal("Oops...", msg, "warning");

				});

	}).done(function(data){
			$.ajax({
					headers : {
				'X-CSRF-Token' : $('input[name="_token"]').val()
					},
					url  : '/settings/locker-locations/add',
					type : 'POST',
					data : $('form#new_locker_location').serialize(),
	});
			swal('Success!' , 'New Locker location added!', "success");
			$('form#new_locker_location')[0].reset();
			window.location.reload();
});

});





</script>
@endsection
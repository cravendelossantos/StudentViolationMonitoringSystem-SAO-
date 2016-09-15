@extends('layouts.master')

@section('title', 'SAO | Locker Management')

@section('header-page')
<div class="col-lg-10">
	<h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>

@endsection


@section('content')


<div class="row">
	<div class="col-md-12 animated fadeInRight">
		<div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2></h2>

                        <div class="row">
                        <div class="col-md-6">
                      <select class="form-control">
	<option>JPL</option>
<option>SHL</option>

                          </select>

                          </div>
<div class="col-md-6">
<select class="form-control"> 
	<option>1st Floor</option>
	<option>2nd Floor</option>
	<option>3rd Floor</option>
	<option>4th Floor</option>
</select>
</div>
</div>


                        <div class="lightBoxGallery">
                           	@foreach ($lockers as $locker)



		@if ($locker->status == "Damaged")
		<a value="{{ $locker->id }}"><img class="locker-damaged" src="/img/locker.png"/></a>

		@elseif ($locker->status == "Available")
		<a value="{{ $locker->id }}"><img class="locker-available" src="/img/locker.png"/></a>

		@elseif ($locker->status == "Occupied")
		<a value="{{ $locker->id }}"><img class="locker-occupied" src="/img/locker.png"/></a>

		@endif

		@endforeach

                            <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                            <div id="blueimp-gallery" class="blueimp-gallery">
                          
                                <h3 class="title"></h3>
                          
                                <ol class="indicator"></ol>
                            </div>

                        </div>

                    </div>
       
	
		</div>	
		</div>
		</div>

		</div>




@endsection

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
</style>
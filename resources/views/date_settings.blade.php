@extends('layouts.master')

@section('title', 'SAO | Date Settings')

@section('header-page')
<div class="col-lg-12">
	<h1>School Year Date</h1>
</div>

@endsection


@section('content')
<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox float-e-margins">

			<div class="ibox-title">
				<h5>Set Dates</h5>
			
			</div>
			<div class="ibox-content">
			<form id="sy_form">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					{{ csrf_field() }}

			<div class="form-group" id="first_sem_range">

				<input type="text" name="description">
                                <label class="font-noraml">First Semester</label>
                                <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon">From</span>
                                    <input type="text" class="input-sm form-control" name="first_semester_start_date" value="">
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="first_semester_end_date" value="">
                                </div>
                            </div>



                            	<div class="form-group" id="second_sem_range">
                                <label class="font-noraml">Second Semester</label>
                                <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon">From</span>
                                    <input type="text" class="input-sm form-control" name="second_semester_start_date" value="">
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="second_semester_end_date" value="">
                                </div>
                            </div>

                            <button type="button" id="sy_date_btn">Set</button>
</form>
                                </div>
                            </div>
                                </div>
                            </div>

@endsection


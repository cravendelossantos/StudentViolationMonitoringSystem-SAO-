@extends('layouts.master')

@section('title', 'SAO | Home')

@section('header-page')




<div class="row">
	<div class="col-lg-12">


		<div class="widget style1 animated fadeInRight">
			
			<div class="col-lg-1">
				
				@if ( $greeting  == 'Good Afternoon' )
				<i class="fa fa-cloud fa-5x"></i>
				@elseif ( $greeting  == 'Good Morning' )    
				<i class="fa fa-sun-o fa-5x"></i>
				@elseif ( $greeting  == 'Good Evening' || $greeting  == 'Good Night' ) 
				<i class="fa fa-moon-o fa-5x"></i>
				@endif	
				
			</div>

			<div class="col-lg-11">

				<p><h2>{{ $greeting }}, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h2>
				<small>&nbsp;Welcome to Student Affairs Office Information System</small></p>
			</div>
			
		</div>
		
		
	</div>

</div>


@endsection


@section('content')



<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content animated fadeInUp">
			{!! $content->value !!}
			</div>
		</div>
	</div>
</div>		




<script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>

<script>
	tinymce.init({ 
		selector:'textarea',
		plugins: "textcolor colorpicker",
  		toolbar: "forecolor backcolor",
  		menubar: false
	});
</script>
@endsection


@extends('layouts.master')

@section('title', 'SAO | Lost and Found Statistics')

@section('header-page')
<div class="row">
<div class="col-md-12">
  <h1>Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}!</h1>
</div>
</div>
@endsection


@section('content')

@endsection


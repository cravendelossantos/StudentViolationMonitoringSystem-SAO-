@extends('layouts.master')

@section('title', 'SAO | User Roles')

@section('header-page')
<div class="col-lg-12">
	<h1>Assign User Roles</h1>
</div>

@endsection


@section('content')



<div class="row">

	<div class="col-md-12 animated fadeInRight">
		<div class="ibox">


			<div class="ibox float-e-margins">
<div class="ibox-content">
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
			<div class="table-responsive">

<table class="table table-striped">

		        <thead>
        <th>Name</th>
		<th>E-Mail</th>
        <th>Admin</th>
        <th>Secretary</th>
        <th>Action</th>
        </thead>

        <tbody>
        @foreach($users as $user)

        @if ($user->hasRole('Super User'))

        @else
            <tr>
                <form action="/user-management/roles/assign" method="post">
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>	
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    
                    	
			
                  

                              <td><input type="checkbox" class="checkbox-info" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>

                    <td><input type="checkbox" class="checkbox-info" {{ $user->hasRole('Secretary') ? 'checked' : '' }} name="role_secretary"></td>
               

                    
                    {{ csrf_field() }}

                    <td><button class="btn btn-sm btn-primary" type="submit">Assign Roles</button></td>
                </form>
            </tr>

            @endif

        @endforeach
        </tbody>
    </table>




		</div>
	</div>
</div>
</div>
</div>
</div>
@endsection


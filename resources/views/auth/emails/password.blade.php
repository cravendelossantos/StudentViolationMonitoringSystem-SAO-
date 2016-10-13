@extends('layouts.passwords')

@section('content')
   <div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="ibox-content">
               <h2 class="font-bold">Student Affairs Office - Information System</h2>


<p>Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a></p>

</div>
</div>
</div>
</div>


@endsection


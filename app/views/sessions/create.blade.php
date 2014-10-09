@extends('layouts.default')

@section('content')


	{{ Form::open(['route' => 'sessions.store']) }}
		<div>
			{{ Form::label('username', 'Username:') }}
			{{ Form::text('username') }}
			{{ $errors->first('username')}}
		</div>
		<div>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</div>
		<div class="col-sm-offset-2 col-sm-10">
      {{ Form::submit('Sign In')}}
      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
    </div>
	{{ Form::close() }}









@stop
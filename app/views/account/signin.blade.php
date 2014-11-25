@extends('layouts.default')

@section('content')

	
	{{ Form::open(['route' => 'account-sign-in-post']) }}
		<div>
			Username: <input id="username" name="username"{{ (Input::old('username')) ? ' value="' . Input::old('username') . '"' : '' }}>
			@if($errors->has('username'))
				{{ $errors->first('username') }}
			@endif
		</div>
		<div>
			Password: <input type="password" id="password" name="password">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div>
			<input type="checkbox" name="remember" id="remember">
			<label>Remember Me</label>
		</div>


		<input type="submit" value="Sign In">
		
	{{ Form::close() }}



@stop
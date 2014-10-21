@extends('layouts.default')

@section('content')

	{{ Form::open(['route' => 'account-change-password']) }}
		<div>
			Old Password: <input type="password" name="old_password">
			@if($errors->has('old_password'))
				{{ $errors->first('old_password') }}
			@endif
		</div>
		<div>
			New Password: <input type="password" name="password">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div>
			Confirm New Password: <input type="password" name="password_again">
			@if($errors->has('password_again'))
				{{ $errors->first('password_again') }}
			@endif
		</div>
		<input type="submit" value="Change Password">


	{{ Form::close() }}
@stop
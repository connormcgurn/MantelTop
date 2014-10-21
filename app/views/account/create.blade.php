@extends('layouts.default')

@section('content')

	{{ Form::open(['route' => 'account-create-post']) }}
    	
	 <div class="form-group">
    	{{ Form::label('username', 'Username: ') }}
    	{{ Form::text('username')}}
        {{ $errors->first('username')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblFirstName', 'First Name: ') }}
    	{{ Form::text('FirstName')}}
        {{ $errors->first('FirstName')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblLastName', 'Last Name: ') }}
    	{{ Form::text('LastName')}}
        {{ $errors->first('LastName')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblEmail', 'Email Address: ') }}
    	{{ Form::text('Email')}}
        {{ $errors->first('Email')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblPassword', 'Password: ') }}
    	{{ Form::text('Password')}}
        {{ $errors->first('Password')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblConfirmPassword', 'ConfirmPassword: ') }}
    	{{ Form::text('ConfirmPassword')}}
        {{ $errors->first('ConfirmPassword')}}
    </div>
    <div class="col-sm-offset-2 col-sm-10">
      {{ Form::submit('Sign Up')}}

      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
    </div>

 {{ Form::close() }}

@stop
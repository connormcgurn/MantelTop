@extends('layouts.default')

@section('content')


	
		<!--  If first login -->	
	@if($user->company_active = 1)
      <!--  Display first time login form -->
     	

     	{{ Form::open(['route' => 'profile-setCompany']) }}
			
			


			<input type="submit" value="Sign In">
		
		{{ Form::close() }}

      

     @else
      <!--  Display user dashboard -->
      <h1>Welcome Back {{ $user->username }}</h1>
     @endif

		
      







@stop
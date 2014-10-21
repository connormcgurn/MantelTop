@extends('layouts.default')

@section('content')
	
      <h1>Welcome to Mantel Top Photography</h1>

      @if(Auth::check())
      <h2>Logged In</h2>
      @else
      <h2>Not Logged In</h2>
      @endif
    
@stop

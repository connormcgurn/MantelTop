@extends('layouts.default')

@section('content')
	<h1>Browse Races</h1>
      



    @foreach ($races as $race)
    	 <?php $raceName = $race->name; ?>
    	
		<div class="col-md-4">
			
			<!--<label name="race", id="race" value="{{ $race->name }}">{{ $race->name }}</label> -->
			<!-- <h3><a href="{{ $race->name }}" onclick="form.submit()" >{{ $race->name }}</h3> -->
			<h3><a href="{{ $raceName }}">{{ $race->name }}</h3>
			
			<!-- <img src="" width="200px"> -->
			

			
		</div>
	 @endforeach


@stop

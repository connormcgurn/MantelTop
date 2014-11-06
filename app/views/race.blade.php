@extends('layouts.default')

@section('content')
	<h5><a href="/browseRacesCont">Back to Races</a></h5>
	<h1>{{ $name }}</h1>

		<div class="row">  			
	  		@foreach ($race as $race)
	  			{{ Form::open(array('url' => 'addToCart', 'method' => 'post'))}}
	  			<div class="col-md-4 well" style="padding:5px">
	  				<img src="<?php echo 'raceImages/' . $name . '/' . $race->url . '/' . $race->url; ?>" width="350px" style="box-shadow: 0 0 15px black;">
	  				<p>{{ $race->url }}</p>
	  				<div>
	  					{{ Form::submit('Add to Cart')}}
	  				</div>
	  				
	  				<input type='hidden' name='url' value='{{ $race->url }}'>
	  			</div>
	  			{{ Form::close() }}
	  		@endforeach


	  	</div>

@stop


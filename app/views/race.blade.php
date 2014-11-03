@extends('layouts.default')

@section('content')

	<h1>{{ $name }}</h1>

		<div class="row">  			
	  		@foreach ($race as $race)
	  			<div class="col-md-4 well" style="padding:5px">
	  				<img src="<?php echo 'raceImages/' . $name . '/' . $race->url . '/' . $race->url; ?>" width="350px" style="box-shadow: 0 0 15px black;">
	  				<p>{{ $race->url }}</p>

	  				<div>
	  					<a href=""><h5>Add to Cart</h5></a>
	  				</div>
	  				

	  			</div>
	  		@endforeach


	  	</div>

@stop


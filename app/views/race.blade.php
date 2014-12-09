@extends('layouts.default')

@section('content')

	<h1>{{ $name }}</h1>

		<div class="row" id="racePictures">  			
	  		@foreach ($race as $race)
	  			{{ Form::open(array('url' => 'addToCart', 'method' => 'post'))}}
	  			
              <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="thumbnail">
                  <img src="<?php echo '/raceImages/' . $name . '/' . $race->url . '/' . $race->url; ?>" alt="race image">
                  <div class="caption">
	  	                {{ Form::submit('Add to Cart', ['class' => 'btn btn-large btn-primary openbutton', 'id' => $race->url])}}
                  </div>
                </div>
              </div>
            
	  			{{ Form::close() }}
	  		@endforeach

	  	</div>

@stop


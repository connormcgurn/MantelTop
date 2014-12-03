@extends('layouts.default')

@section('content')
	<h1>Browse Races</h1>
      


	<div class="row">
    @foreach ($races as $race)
    	 <?php $raceName = $race->name; ?>
    		<div class="col-md-4 well" style="padding:5px">
					<h3><a href="/race/{{ $raceName }}">{{ $race->name }}</h3>
					<img src="<?php echo 'raceImages/' . $race->name . '/' . $race->coverImage . '/' . $race->coverImage; ?>" width="350px" style="box-shadow: 0 0 15px black;">
			</div>
			
			
	 @endforeach
	</div>


@stop

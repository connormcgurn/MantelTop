@extends('layouts.default')

@section('content')



      <!--  Display user dashboard -->
      <h1>Admin Panel</h1>
      <h2>{{ $user->username }}</h2>

      <h3>Add a Race</h3>
      <!--  -->
      	<div class="well">

      			{{ Form::open(array('url' => 'addRace', 'method' => 'post'))}}

				    <div class="form-group">
				    	{{ Form::label('lblraceName', 'Name: ') }}
				    	{{ Form::text('name')}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('lblRaceDate', 'Date: ') }}
				    	{{ Form::text('date')}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('lblPackageID', 'Package ID: ') }}
				    	{{ Form::text('packageID')}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('location', 'Location: ') }}
				    	{{ Form::text('location')}}
				    </div>
				    <div class="col-sm-offset-2 col-sm-10">
				      {{ Form::submit('Add Race', ['class' => 'btn btn-large btn-primary openbutton'])}}
				      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
				    </div>

			 {{ Form::close() }} 
      	</div>
      <h3>Add Photos</h3>
      <!-- Add photos to a race -->
      	<div class="well">


  			{{ Form::open(array('url' => 'imageUpload', 'files' => true, 'method' => 'post'))}}

				{{ Form::select('race', Race::lists('name', 'name')) }}

			    <div class="form-group">
			      <label for="fileToUpload" class="col-sm-2 control-label">Choose All Race Images</label>
			  	</br>
			      {{ Form::file('images[]', ['multiple' => true]) }}
			    </div>
			    	



			 
			    <div class="col-sm-offset-2 col-sm-10">
			      {{ Form::submit('Add Photos', ['class' => 'btn btn-large btn-primary openbutton'])}}
			      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
			    </div>

			 {{ Form::close() }} 
      	</div>
      <h3>Edit Photos</h3>
      <!-- Display all images for a race with text boxes under each to enter bib numbers-->
      	<div class="well">
      		{{ Form::open(array('url' => 'loadPhotos', 'method' => 'post'))}}
      			{{ Form::select('race', Race::lists('name', 'name')) }}
      			<div class="col-sm-offset-2 col-sm-10">
				      {{ Form::submit('Load Photos', ['class' => 'btn btn-large btn-primary openbutton'])}}
				      
				</div>
      		{{ Form::close() }}

      		<div class="row">
      		@if(isset($url))
      			<h2>{{ $race }}</h2>
      			{{ Form::open(array('url' => 'editPhotos', 'method' => 'post'))}}
	      		@foreach ($url as $url)
	      			<div class="col-md-4">
	      				<img src="<?php echo 'raceImages/' . $race . '/' . $url->url . '/' . $url->url; ?>" width="350px" style="box-shadow: 0 0 15px black;">
	      				<h5>{{ $url->url }}</h5>
	      				<div class="form-group">
	      					{{ Form::label('delete', 'Delete ') }}
					    	<input type='checkbox' name='delete[]' value='{{ $url->url }}'>
				    	</div>
				    	<div class="form-group">
				    		{{ Form::label('CoverPhoto', 'Make Cover Photo ') }}
					    	{{ Form::radio('cover', $url->url) }}
				    	</div>
	      				<div class="form-group">
					    	{{ Form::label('bib1', 'Bib 1: ') }}
					    	{{ Form::text('bib1')}}
				    	</div>
				    	<div class="form-group">
					    	{{ Form::label('bib2', 'Bib 2: ') }}
					    	{{ Form::text('bib2')}}
				    	</div>

	      			</div>
	      			<input type='hidden' name='url[]' value='{{ $url->url }}'>
	      		@endforeach
	      		<input type='hidden' name='race' value='{{ $race }}'>

	      		<div class="col-sm-offset-2 col-sm-10">
				      {{ Form::submit('Save Images', ['class' => 'btn btn-large btn-primary openbutton'])}}
				      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
				    </div>
				{{ Form::close() }} 

      		@endif
      		</div>
			
      	</div>

		<h3>Edit Portfolio</h3>
      	<div class="well">
      		
      		{{ Form::open(array('url' => 'addPortfolioPhotos', 'files' => true, 'method' => 'post'))}}

				

			    <div class="form-group">
			      <label for="fileToUpload" class="col-sm-2 control-label">Choose Photos</label>
			  	</br>
			      {{ Form::file('images[]', ['multiple' => true]) }}
			    </div>
			    	



			 
			    <div class="col-sm-offset-2 col-sm-10">
			      {{ Form::submit('Add Photos', ['class' => 'btn btn-large btn-primary openbutton'])}}
			      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
			    </div>

			 {{ Form::close() }} 
			 </br>
			 {{ Form::open(array('url' => 'loadPortfolioPhotos', 'method' => 'post'))}}
      			<div class="col-sm-offset-2 col-sm-10">
				      {{ Form::submit('Load Photos', ['class' => 'btn btn-large btn-primary openbutton'])}}
				      
				</div>
      		{{ Form::close() }}




      	</div>






@stop
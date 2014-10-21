@extends('layouts.default')

@section('content')


	<h1>Add a Race</h1>



<!--{{ Form::open(['url' => 'imageUpload'], array('files'=> true)) }}-->
{{ Form::open(array('url' => 'imageUpload', 'files' => true, 'method' => 'post'))}}

    <div class="form-group">
      <label for="fileToUpload" class="col-sm-2 control-label">Choose All Race Images</label>
  	</br>
      {{ Form::file('images[]', ['multiple' => true]) }}
    </div>
    	
<!-- Progress Bar -->
    <div class="form-group">
    	{{ Form::label('lblraceName', 'Race Name: ') }}
    	{{ Form::text('raceName')}}
    </div>
    <div class="form-group">
    	{{ Form::label('rlblaceDate', 'Race ID: ') }}
    	{{ Form::text('raceName')}}
    </div>
    <div class="form-group">
    	{{ Form::label('lblPackageID', 'Package ID: ') }}
    	{{ Form::text('packageID')}}
    </div>
    <div class="col-sm-offset-2 col-sm-10">
      {{ Form::submit('Add Race')}}
      <!--<button type="submit" class="btn btn-default">Sign in</button> -->
    </div>

 {{ Form::close() }} 

{{HTML::script('assets/js/uploadScript.js')}}
 
@stop

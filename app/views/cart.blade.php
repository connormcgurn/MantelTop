@extends('layouts.default')

@section('content')


<h1>Shopping Cart</h1>
	
	

	{{ Form::open(array('url' => 'checkout', 'method' => 'post'))}}	
	@foreach($cart as $url)
	<div class="row well" >
		<?php $race = strstr($url, '-', true); ?>
		<div class="col-md-6">
			<img src="<?php echo 'raceImages/' . $race . '/' . $url . '/' . $url; ?>" style="box-shadow: 0 0 15px black; max-width:150px;">

		</div>
		<div class="col-md-6">
			<div>
				{{ Form::label('delete', 'Digital Download ') }}
				<input type='checkbox' name='digital[]' value='{{ $url }}'>
				<p>($20.00 each)</p>
			</div>
			<h4>Order Prints</h4>
			<div class="col-md-2">
				{{ Form::label('delete', '4x6: ') }}
				<input type="text" name="4x6" style="width:30px">
				<p>($1.50 each)</p>
			</div>
			<div class="col-md-2">
				{{ Form::label('delete', '5x7: ') }}
				<input type="text" name="5x7" style="width:30px">
				<p>($5.50 each)</p>
			</div>
			<div class="col-md-2">
				{{ Form::label('delete', '8x10: ') }}
				<input type="text" name="8x10" style="width:30px">
				<p>($15.00 each)</p>
			</div>
			<div class="col-md-2">
				{{ Form::label('delete', '11x14: ') }}
				<input type="text" name="11x14" style="width:30px">
				<p>($25.00 each)</p>
			</div>
			
		</div>
	</div>
	@endforeach
	
	{{ Form::submit('Checkout')}}
	{{ Form::close() }}




@stop
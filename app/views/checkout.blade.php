@extends('layouts.default')

@section('content')

<h1>Checkout</h1>

<div class="col-md-8">
@if ($_SESSION['orderData'] != null)


    @foreach($_SESSION['orderData']['orders'] as $url=>$sizes)
    	<?php $race = strstr($url, '-', true); ?>
    	<div class="row" style="margin:50px;">
    	
	    	<div class="col-md-4">
	    		<img src="<?php echo 'raceImages/' . $race . '/' . $url . '/' . $url; ?>" style="box-shadow: 0 0 15px black; max-width:150px;">
	    	</div>

	    	<div class="col-md-4">
	        <h3>Picture: {{$url}}</h3>
	        @foreach($sizes['sizes'] as $sizeType=>$quanity)
	            <h4>Size: {{$sizeType}}. Quantity: {{$quanity}}</h4>
	        @endforeach
	    	</div>
    	</div>
    @endforeach


    
@endif
</div>
<div class="col-md-4">
	{{ Form::open(array('url' => 'pay', 'method' => 'post'))}}

	{{ Form::label('firstname', 'First Name: ') }}
    {{ Form::text('firstName')}}
    </br>
    {{ Form::label('lastname', 'Last Name: ') }}
    {{ Form::text('lastName')}}
    <br>
    {{ Form::label('address', 'Street Address: ') }}
    {{ Form::text('address')}}
    <br>
    {{ Form::label('town', 'Town/City: ') }}
    {{ Form::text('town')}}
    <br>
    {{ Form::label('zip', 'Zip Code: ') }}
    {{ Form::text('zip')}}
    <br>
	<br>
	<h3>Credit Card Information</h3>
	{{ Form::label('carNumber', 'Credit Card Number: ') }}
    {{ Form::text('cardNumber')}}
    <br>
    {{ Form::label('exp', 'Experation Date: ') }}
    {{ Form::text('exp')}}

    <br>


	{{ Form::submit('Pay', ['class' => 'btn btn-large btn-primary openbutton']) }}

	{{ Form::close() }}
	<h2>Subtotal....... ${{$_SESSION['orderData']['price']}}</h2>
</div>




@stop
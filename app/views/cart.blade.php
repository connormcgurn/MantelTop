@extends('layouts.default')

@section('content')


<h1>Shopping Cart</h1>
	
	


	<h2>Cart Layout Idea 1</h2>
    @if($_SESSION['cart'] != null)
    {{ Form::open(array('url' => 'checkout', 'method' => 'post'))}}	
	<table class="table container" id="cart" style="width:1000px">
	  <tr>
	  	<th>Enter Order Quantities</th>
	    <th>Digital Download</th>
	    <th>4x6</th>
	    <th>5x7</th>		
	    <th>8x10</th>
	    <th>11x14</th>
	    <th></th>
	  </tr>
	  @foreach($cart as $url)
	  <?php $race = strstr($url, '-', true); ?>
	  
	  <tr id = {{ $url }}>
	  	<td><img src="<?php echo 'raceImages/' . $race . '/' . $url . '/' . $url; ?>" style="box-shadow: 0 0 15px black; max-width:150px;"></td>
	  	<td><input type='checkbox' data-cost="15.00" name='digital[]'><p>($15.00 each)</p></td>
	    <td><input type="text" data-cost="3.50" name="4x6" style="width:30px" ><p>($3.50 each)</p></td>
	    <td><input type="text" data-cost="6.50" name="5x7" style="width:30px"><p>($6.50 each)</p></td>		
	    <td><input type="text" data-cost="15.00" name="8x10" style="width:30px"><p>($15.00 each)</p></td>
	    <td><input type="text" data-cost="25.00" name="11x14" style="width:30px"><p>($25.00 each)</p></td>
	    <td><a href="removeFromCart">Remove</a></td>
	  </tr>
		@endforeach
	  <tr>
	  	<td></td>
	  	<td></td>
	  	<td><h3>Subtotal:</h3></td>
	  	<td><h3 id="cartPrice">$0.00</h3></td>
	  	<td>{{ Form::submit('Checkout', ['class' => 'btn btn-large btn-primary openbutton']) }}</td>
          
	  </tr>
	</table>
    {{ Form::close() }}
    @else
		Nothing in Cart
	@endif
@stop
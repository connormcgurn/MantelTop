@extends('layouts.default')

@section('content')

<h1>Checkout</h1>

<p>This page will be a purchase summary and payment process via Stripe</p>

@foreach($orders as $order)
	
		<?php print_r($order); ?>

@endforeach

@stop
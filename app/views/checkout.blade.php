@extends('layouts.default')

@section('content')

<h1>Checkout</h1>

<p>This page will be a purchase summary and payment process via Stripe</p>

@foreach($order->orders as $order)
	<p>Hello</p>
@endforeach




@stop
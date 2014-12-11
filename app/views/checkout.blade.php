@extends('layouts.default')

@section('content')

<h1>Checkout</h1>

<p>This page will be a purchase summary and payment process via Stripe</p>

@if ($_SESSION['orderData'] != null)
<h1>Price of order: {{$_SESSION['orderData']['price']}}</h1>
    @foreach($_SESSION['orderData']['orders'] as $url=>$sizes)
        <h3>Picture: {{$url}}</h3>
        @foreach($sizes['sizes'] as $sizeType=>$quanity)
            <h4>Size: {{$sizeType}}. Quantity: {{$quanity}}</h4>
        @endforeach
    @endforeach
@endif


@stop
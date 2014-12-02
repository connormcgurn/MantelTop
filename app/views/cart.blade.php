@extends('layouts.default')

@section('content')

<h1>Shopping Cart</h1>
	
	@foreach($cart as $url)
		<h2>{{ $url }}</h2>

	@endforeach





@stop
@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- {{ $product->name }}
@stop

@section('content')

<div class="container">

@include('pages.product.frac.nav')

		<h1>Showing {{ $product->name }}</h1>

		<div class="jumbotron text-center">
			<h2>{{ $product->name }}</h2>
			<p>
				 PIC<br>
				<strong>Name:</strong> {{ $product->name }}  <br>
				<strong>Price:</strong> {{ $product->price }} ฿<br>
				<strong>Brand:</strong> {{{ Brand::find($product->brand_id)->name }}}<br>
				<strong>Category:</strong> {{{ Category::find($product->category_id)->name }}}<br>
			</p>
		</div>

	</div>

	<hr class="tall" />
	<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
	<script src="<?php echo asset('js/admin_product.js')?>"></script>
	@stop
@extends('layouts.default')

@section('meta')
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template - 2.5.0">
	<meta name="author" content="okler.net">
@stop

@section('title')
	test
@stop

@section('content')
		@include('frac.test')
		@foreach($username as $user)
        	<p> {{ $user->name }} </p>
    	@endforeach
				
@stop
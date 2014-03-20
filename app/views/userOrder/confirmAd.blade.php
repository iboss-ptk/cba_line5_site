@extends('layouts.default')

@section('content')

<div class="col-md-12">
	{{ Form::open(array('action' => 'DoOrderController@postUserAddress')) }}
	<br>
	<h1> Confirm your address </h1>
		    <!-- will be used to show any messages -->
	    @if (Session::has('message'))
	        <div class="alert alert-info">{{ Session::get('message') }}</div>
	    @endif
	<div class="control-group">
		<!--{{ Form::label('address', 'confirm your address') }} <br>-->
		
		{{$address}} 
	</div>

	<br>
	{{ Form::submit('Confirm', array('class' => 'btn btn-success')) }}
	{{ Form::close() }}
	<br>
	<a href="{{ URL::to('doorder/edit-user-address') }}" class="btn btn-success">Edit</a>



</div>






	<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
@stop



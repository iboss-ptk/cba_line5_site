@extends('layouts.default')

@section('content')

<div class="col-md-12" ng-app>

    <br>
    <h1>Admin Check Order</h1>
    <!-- Button trigger modal -->

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <br><br>
     {{ Form::open(array('url'=>'checkorder/all-check-confirm/','method'=>'GET')) }}
    <button type="submit" class="btn btn-success  " >
    status 4
    </button>
             
    {{ Form::close() }}
    <br><br>
     {{ Form::open(array('url'=>'checkorder/status5-no/','method'=>'GET')) }}
    <button type="submit" class="btn btn-success  " >
    status 5 No resp_sp
    </button>
             
    {{ Form::close() }}
    <br><br>
     {{ Form::open(array('url'=>'checkorder/status5-yes/','method'=>'GET')) }}
    <button type="submit" class="btn btn-success  " >
    status 5 have resp_sp
    </button>
             
    {{ Form::close() }}
                           
        

<hr class="tall" />

@stop
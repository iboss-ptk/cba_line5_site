@extends('layouts.default')

@section('content')

<div class="col-md-12" ng-app>

    <br>
    <h1>Check confirmation</h1>
    <!-- Button trigger modal -->

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <br>
    <h3>User information</h3>
 <table class="table table-striped table-bordered">
  <hr>
  <thead>
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Email</td>
        <td>Firstname</td>
        <td>Lastname</td>
        <td>Mobilephonenumber</td>
        <td>Address</td>       
    </tr>
</thead>
<tbody>
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->firstname}}</td>
        <td>{{$user->lastname}}</td>
        <td>{{$user->mobilephonenumber}}</td>
        <td>{{$user->address}}</td>  

</tbody>

</table>
    
    <br>
    <h3>payment</h3>
    <br><br>
{{ HTML::image($order->image_path,'confirmation_pic_' . $order->id, array('class'=>'feature', 'width'=>'100', 'height'=>'100')) }}

    <br><br>
    {{ Form::open(array('action' => array('CheckOrderController@postCheckConfirm',$order->id))) }}
    <button type="submit" class="btn btn-success  " >
    approve
    </button>
             
    {{ Form::close() }}

    <br><br>

    {{ Form::open(array('url'=>'checkorder/all-check-confirm/','method'=>'GET')) }}
    <button type="submit" class="btn btn-success  " >
    pending
    </button>
             
    {{ Form::close() }}
        

</div>
<hr class="tall" />
<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/user_manager.js')?>"></script>

@stop
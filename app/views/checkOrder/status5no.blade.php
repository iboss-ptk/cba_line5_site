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

<table class="table table-striped table-bordered">
  <hr>
  <thead>
    <tr>
        <td>Order_ID</td>
        <td>Orederlist</td>
        <td>User_ID</td>
        <td>Confirmed_Image</td>
        <td>check</td>         
    </tr>
</thead>
<tbody>
    @foreach ($ordersNo as $order)
        <td>{{ $order->id }}</td>
        <td> {{ Form::open(array('url'=>'checkorder/show-orderlist/'.$order->id,'method'=>'GET')) }}
                <button type="submit" class="btn btn-success  " >
                    Show Order List
                </button>
         
                {{ Form::close() }}
        </td>
        <td>{{ $order->user_id }}</td>
        

</tbody>
@endforeach
</table>


</div>
<hr class="tall" />
<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/user_manager.js')?>"></script>

@stop
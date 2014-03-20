@extends('layouts.default')

@section('content')

<div class="col-md-12" ng-app>

    <br>
    <h1>All order</h1>
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
        <td>Status</td>
        <td>Confirmed_Image</td>
        <!--    <td>Confirmed</td>มันไม่มีก็ได้--> 
         <td></td>
    </tr>
</thead>
<tbody>
    @foreach ($orders as $order)
        <td>{{ $order->id }}</td>
        <td>
             @if ($order->status === 0)
             รอการยืนยันอยู่นะจ๊ะ
             @elseif ($order->status === 1)
             รอจ่ายยืนยัน ที่อยู่นะจ๊ะ คลิก ที่ ปุ่ม Address เลยจ้าาา
             { Form::open(array('url'=>'doorder/edit-user-address')) }}
                <button type="submit" class="btn btn-success btn-block" >
                    Address
                </button>
                {{ Form::close() }}
              @elseif ($order->status === 2)
              โดนลบแล้วจ้าาาา สั่งมาใหม่น้าาาา
              @elseif ($order->status === 3)
             รอจ่ายตังจ๊ะ  จ่ายแล้วคลิกที่ confirm เพื่ออัพรูปเลยจ้าาาา
               {{ Form::open(array('url'=>'doorder/confirmation/'.$order->id)) }}
                <button type="submit" class="btn btn-info  btn-block" >
                    Confirm
                </button>
                {{ Form::close() }}
             @elseif ($order->status === 4)
             รอตรวจสอบจ้าาาา
             @elseif ($order->status === 5)
             ส่งอยู่นะครัชชช
        @else
            Status นี้มาได้ไงครัชชช มันไม่มี
          @endif

        </td>
        <td>{{ HTML::image($order->image_path,'confirmation_pic_' . $order->id, array('class'=>'feature', 'width'=>'100', 'height'=>'100')) }}</td> 
       <!-- <td>{{ $order->confirmed }}</td> มันไม่มีก็ได้--> 
         <td> {{ Form::open(array('url'=>'doorder/show-orderlist/'.$order->id)) }}
                <button type="submit" class="btn btn-success btn-block" >
                    Show Order List
                </button>
                {{ Form::close() }}
                 </td>

</tbody>
@endforeach
</table>


</div>
<hr class="tall" />
<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/user_manager.js')?>"></script>

@stop
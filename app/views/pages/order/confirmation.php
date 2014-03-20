@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Edit
@stop

@section('content')
<div class="container" ng-app="attribute">


    @include('pages.order.frac.nav')

    <div class="col-md-6 col-md-offset-3" style="margin-top:10px">
        <h1>Edit order</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($order, array('route' => array('order.updateconfirmation', $order->id), 'method' => 'PUT', 'files'=> true)) }}

         <div class="form-group">

         {{ Form::label('image_path', 'Image :') }} 
         <!-- {{ Form::file('image_path' , Input::old('image_path'), array('class' => 'form-control'))}} -->
         <input type="radio" name="img_selc" ng-model="img_selc" value="text" checked="true">  URL &nbsp&nbsp
         <input type="radio" name="img_selc" ng-model="img_selc" value="file"> Upload <br/>
         <input ng-if="img_selc=='text'" name="image_path" type="text" class="form-control" value="{{Input::old('image_path')}}">
         <input ng-if="img_selc=='file'" name="image_path" type="file" class="form-control" value="{{Input::old('image_path')}}">
     </div>


                {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg btn-block')) }}

                {{ Form::close() }}
            </div>

        </div>
        <hr class="tall" />


        <script src="<?php echo asset('vendor/angular.min.js')?>"></script>
        <script src="<?php echo asset('js/attribute.js')?>"></script>
        @stop
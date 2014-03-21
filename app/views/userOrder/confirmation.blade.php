@extends('layouts.default')

@section('content')

<div class="col-md-12" ng-app>
    {{Form::open(array('action' => array('DoOrderController@postConfirmation', $order->id),'files'=> true))}}
    <br>
    <h1> Confirmation </h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </div>
    @endif
    <div class="form-group">
    {{ Form::label('image_path', 'Image :') }} 
         <!-- {{ Form::file('image_path' , Input::old('image_path'), array('class' => 'form-control'))}} -->
         <input type="radio" name="img_selc" ng-model="img_selc" value="text" checked="true">  URL &nbsp&nbsp
         <input type="radio" name="img_selc" ng-model="img_selc" value="file"> Upload <br/>
         <input ng-if="img_selc=='text'" name="image_path" type="text" class="form-control" value="{{Input::old('image_path')}}">
         <input ng-if="img_selc=='file'" name="image_path" type="file" class="form-control" value="{{Input::old('image_path')}}">
     </div>


    <br>
    
    {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}

    {{ Form::close() }}

</div>

<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
@stop
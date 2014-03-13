@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Forgot password
@stop

@section('content')
<div class="container" ng-app="attribute">


    @include('pages.product.frac.nav')

    <div class="col-md-6 col-md-offset-3" style="margin-top:10px">
        <h1>Create a Product</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}


        {{ Form::open(array('url' => 'product','files'=>true ))}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>


        <div class="form-group">
            {{ Form::label('product_pic', 'Choose an image') }}
            {{ Form::file('product_pic', Input::old('product_pic'), array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            <div class="input-group">
                {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
                <span class="input-group-addon">฿</span>
            </div>

        </div>


        <div class="form-group">
            {{ Form::label('brand', 'Brand') }}
            <select name="brand" class="form-control">
                <option value=null>Select brand</option>
                @foreach($brand_all as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category') }}
            <select name="category" class="form-control">
                <option value=null>Select category</option>
                @foreach($category_all as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div ng-controller="AttCtrl">

            <div ng-repeat="type in types">
                <h5>@{{type.name}}</h5>
                <input type="text" name="@{{'type_'+$index}}" value="@{{type.name}}">
                <div ng-repeat="att in type.data">
                    <a><i class="fa fa-times" ng-click="delete(type.name,att)"></i></a> @{{att}} <br>
                    <input type="text" name="@{{'att_'+$parent.$index+$index}}" value="@{{att}}">@{{'att_'+$parent.$index+$index}}
                </div>
                <input type="text" ng-model="new_att" ng-enter="add_att(type.name,new_att); new_att='';">
                <a><i class="fa fa-plus-circle fa-lg" ng-click="add_att(type.name,new_att); new_att='';"></i></a>
                <br><br>
            </div>

            <a ng-click="add_type()">new property</a>

            <hr>

        </div>
        {{ Form::submit('Create', array('class' => 'btn btn-primary btn-lg btn-block')) }}

        {{ Form::close() }}
    </div>

</div>
<hr class="tall" />


<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/attribute.js')?>"></script>
@stop

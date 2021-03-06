@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Create Product
@stop

@section('content')
<div class="container" ng-app="attribute">


    @include('pages.product.frac.nav')

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="col-md-6 col-md-offset-3" style="margin-top:10px">
        <h1>Create a Product</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}


        {{ Form::open(array('url' => 'product','files'=>true ))}}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'id' => 'form')) }}
        </div>


        <div class="form-group">

           {{ Form::label('product_pic', 'Image :') }} 
           <!-- {{ Form::file('product_pic' , Input::old('product_pic'), array('class' => 'form-control'))}} -->
           <input type="radio" name="img_selc" ng-model="img_selc" value="text" checked="true">  URL &nbsp&nbsp
           <input type="radio" name="img_selc" ng-model="img_selc" value="file"> Upload <br/>
           <input ng-if="img_selc=='text'" name="product_pic" type="text" class="form-control" value="{{Input::old('product_pic')}}">
           <input ng-if="img_selc=='file'" name="product_pic" type="file" class="form-control" value="{{Input::old('product_pic')}}">
       </div>

       <div class="form-group">
        {{ Form::label('price', 'Price') }}
        <div class="input-group">
            {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
            <span class="input-group-addon">฿</span>
        </div>

    </div>

    <div class="form-group">
        {{ Form::label('Description', 'Description') }}
        {{ Form::textarea('description','', array('class' => 'form-control', 'placeholder' => 'Description')) }}

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
            <h5>@{{type.name}} <a ng-click="delete_type($index)" style="font-size:8px;">(del)</a></h5>
            <input type="hidden" name="@{{'type_'+$index}}" value="@{{type.name}}">
            <div ng-repeat="att in type.data">
                <a><i class="fa fa-times" ng-click="delete(type.name,att)"></i></a> @{{att}} <br>
                <input type="hidden" name="@{{'att_'+$parent.$index+$index}}" value="@{{att}}">
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



@stop

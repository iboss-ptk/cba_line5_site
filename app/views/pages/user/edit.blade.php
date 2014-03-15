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
<div class="container">


    @include('pages.user.frac.nav')

    <div class="col-md-6 col-md-offset-3" style="margin-top:10px">
        <h1>Edit Product</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'files'=> true)) }}

        <div class="form-group">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('sp_code', 'SP_Code') }}
            {{ Form::boolean('sp_code', Input::old('sp_code'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('isadmin', 'Isadmin') }}
            {{ Form::boolean('isadmin', Input::old('isadmin'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('issp', 'Issp') }}
            {{ Form::boolean('issp', Input::old('issp'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('firstname', 'Firstname') }}
            {{ Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('lastname', 'Lastname') }}
            {{ Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('mobilephonenumber', 'mobilephonenumber') }}
            {{ Form::text('mobilephonenumber', Input::old('mobilephonenumber'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('banned', 'banned') }}
            {{ Form::boolean('banned', Input::old('banned'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('resp_sp_code', 'Resp_SP_Code') }}
            {{ Form::boolean('resp_sp_code', Input::old('resp_sp_code'), array('class' => 'form-control')) }}
        </div>

        <!--<div class="form-group">

         {{ Form::label('product_pic', 'Choose an image') }}
         {{ Form::file('product_pic' , Input::old('product_pic'), array('class' => 'form-control'))}}-->
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
        <select name="brand" id="brand" class="form-control">
            <option value=null>Select brand</option>
            @foreach($brand_all as $brand)


            <option value="{{$brand->id}}" 
                <?php if ($product->brand_id == $brand->id) echo "selected =\"selected\" "; ?>
                >{{$brand->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category') }}
            <select name="category" id="category" class="form-control">
                <option value=null>Select category</option>
                @foreach($category_all as $category)
                <option value="{{$category->id}}"
                    <?php if ($product->category_id == $category->id) echo "selected =\"selected\" "; ?>
                    >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>



            <div ng-app="attribute" ng-controller="AttCtrl" ng-init='types={{json_encode($atts)}}'>
                <div ng-repeat="type in types">
                    <h5>@{{type.name}}</h5>
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

                {{ Form::submit('Edit', array('class' => 'btn btn-primary btn-lg btn-block')) }}

                {{ Form::close() }}
            </div>

        </div>
        <hr class="tall" />


        <script src="<?php echo asset('vendor/angular.min.js')?>"></script>
        <script src="<?php echo asset('js/attribute.js')?>"></script>
        @stop
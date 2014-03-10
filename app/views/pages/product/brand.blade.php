@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Brands
@stop

@section('content')
<div class="container" ng-app="brand_manager" ng-controller="BrandCtrl">


    @include('pages.product.frac.nav')
    <h1>Brand</h1>
    <br>

    <div class="col-md-6 col-md-offset-3">
        <input  ng-model="bname.name" placeholder="brand.." class="form-control" >
        <hr>
        <div ng-repeat="brand in brands | filter:bname">
            <p>
                <span id="@{{brand.id}}">@{{ brand.name }}</span>
                <span class="pull-right" ng-if="brand !== NULL">
                    <a><i class="fa fa-pencil-square fa-2x" ng-click="edit(brand.id)"></i></a>
                    <a><i class="fa fa-minus-square fa-2x" ng-click="delete(brand.id)"></i></a>
                </span>
            </p>
        </div>

        <hr>
    <div class="input-group">
      <input type="text" class="col-md-7" ng-model="new_brand">
      <span class="input-group-btn">
        <button class="btn btn-default btn-sm" type="button" ng-click="add()">ADD!</button>
      </span>
    </div>



    </div>

    <script src="<?php echo asset('vendor/angular.min.js')?>"></script>
    <script src="<?php echo asset('js/brand_manager.js')?>"></script>

    @stop
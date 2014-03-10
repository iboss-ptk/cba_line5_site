@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Products
@stop

@section('content')
<div class="container" ng-app="product_manager">


    @include('pages.product.frac.nav')
    <h1>All the product</h1>
    <!-- Button trigger modal -->

    <button class="btn btn-primary btn-small " data-toggle="modal" data-target="#myModal">
      filter option
  </button>

  <br>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Filter option</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="filter" role="form" method="get" action="{{URL::to('product')}}">

              <div class="form-group">
                <label for="Brand" class="col-sm-2 control-label">Brand</label>
                <div class="col-sm-10">

                    @foreach($brand_all as $brand)
                    <input type="checkbox" name="brand" value="{{$brand->id}}">{{$brand->name}}<br>
                    @endforeach

                </div>
            </div>

            <div class="form-group">
                <label for="Category" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">

                    @foreach($brand_all as $category)
                    <input type="checkbox" name="category" value="{{$category->id}}">{{$category->name}}<br>
                    @endforeach

                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" form="filter" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
</div>

<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered"  ng-controller="ProductCtrl">
    <input ng-model="test"> 
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Picture</td>
            <td>Brand</td>
            <td>Category</td>
            <td>Price</td>
            <td>Availability</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <tr class="" ng-repeat="product in products | filter:test"> <!-- add class warning -->
            <td>@{{ product.id }}</td>
            <td>@{{ product.name }}</td>
            <td>@{{ product.product_pic }}</td> <!--pic-->
            <td>@{{ product.brand }}</td>
            <td>@{{ product.category }}</td>
            <td>@{{ product.price}}</td>
            <td>
                <a ng-href="product/toggle/@{{product.id}}">

                    <button ng-if="product.available===0" class="btn btn-small btn-default btn-block anchor"><b>O</b></button>

                    <button ng-if="product.available===1" class="btn btn-small btn-primary btn-block anchor"><b>X</b></button>

                </a>
            </td>

            <td>


                
                <a class="btn btn-success btn-block" ng-href="product/@{{product.id}}" target="_blank">Show</a>

                <a class="btn btn-info  btn-block" ng-href="product/@{{product.id}}/edit" target="_blank">Edit</a>
                
                <a class="btn btn-warning  btn-block" ng-click="delete_product(product.id)">Delete</a>
            </td>
        </tr>
        <!-- end ng-reapeat -->
    </tbody>
</table>


</div>
<hr class="tall" />
<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/product_manager.js')?>"></script>

@stop
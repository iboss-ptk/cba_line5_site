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
<div class="container" ng-app="product_manager"  ng-controller="ProductCtrl">


    @include('pages.product.frac.nav')
    <h1>All the product</h1>
    <!-- Button trigger modal -->


    <br>

    <!-- Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="filterLabel">Filter option</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" id="filter" role="form" method="get" action="{{URL::to('product')}}">

              <div class="form-group">
                <label for="Brand" class="col-sm-2 control-label">Brand</label>
                <div class="col-sm-10">

                    @foreach($brand_all as $brand)
                    <input type="checkbox" name="brand[]" value="{{$brand->id}}" ng-checked="selection.indexOf({{$brand->id}}) > -1">{{$brand->name}}<br>
                    @endforeach

                </div>
            </div>

            <div class="form-group">
                <label for="Category" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">

                    @foreach($category_all as $category)
                    <input type="checkbox" name="category[]" value="{{$category->id}}" ng-checked="selection.indexOf({{$category->id}}) > -1">{{$category->name}}<br>
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
<div class="alert alert-danger" ng-if="message">@{{ message }}</div>

<table class="table table-striped table-bordered">
   <a class=" pull-right" data-toggle="modal" data-target="#filterModal">
      filter option
  </a>
  <input id="search" ng-focus="" ng-model="search" placeholder="product name..." class="form-control" >
  <hr>
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
    <tr ng-repeat="product in products"> <!-- add class warning -->
        <td>@{{ product.id }}</td>
        <td>@{{ product.name }}</td>
        <td><img style="max-height: 200px; max-width: 200px;" ng-src="@{{product.product_pic}}"/></td> <!--pic-->
        <td>@{{ product.brand }}</td>
        <td>@{{ product.category }}</td>
        <td>@{{ product.price}}</td>
        <td>
            <a ng-click="toggle(product.id, $index)">

                <div ng-switch on="product.availability">
                   <button class="btn btn-small btn-block btn-default" ng-switch-when="true"><b>O</b></button>
                   <button class="btn btn-small btn-block btn-danger" ng-switch-when="false"><b>X</b></button>
                   <div ng-switch-default>
                    <button ng-if="product.availability===1" class="btn btn-small btn-default btn-block"><b>O</b></button>
                    <button ng-if="product.availability===0" class="btn btn-small btn-primary btn-block"><b>X</b></button>
                </div>

            </div>


        </a>
    </td>

    <td>



        <a class="btn btn-success btn-block" ng-href="product/@{{product.id}}" target="_blank">Show</a>

        <a class="btn btn-info  btn-block" ng-href="product/@{{product.id}}/edit">Edit</a>

        <a class="btn btn-warning  btn-block" ng-click="delete_product(product.id, product.name)">Delete</a>


    </td>
</tr>
<!-- end ng-reapeat -->
<div>
 <ul class="pager">
  <li class="previous" ng-click="prev()"><a href="">&larr; Previous</a></li>
  <li>Pages : @{{currentPage}} / @{{total}} </li>
  <li class="next" ng-click="next()"><a href="">Next &rarr;</a></li>
</ul>
</div>
</tbody>
</table>


</div>
<hr class="tall" />

@stop
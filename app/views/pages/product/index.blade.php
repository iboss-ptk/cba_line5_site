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
<div class="container">


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

<table class="table table-striped table-bordered">
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
        @foreach($products as $key => $value)
        <tr id="{{ $value->id}}" class="anchor <?php if(!$value->availability) echo "warning";?>">
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>pic</td> <!--pic-->
            <td>{{{ Brand::find($value->brand_id)->name }}}</td>
            <td>{{{ Category::find($value->category_id)->name }}}</td>
            <td>{{ $value->price}}</td>
            <td>
                <a href="{{URL::to('product/toggle/' . $value->id)}}">
                    @if($value->availability)
                    <button class="btn btn-small btn-default btn-block anchor"><b>O</b></button>
                    @else
                    <button class="btn btn-small btn-primary btn-block anchor"><b>X</b></button>
                    @endif
                </a>
            </td>

            <td>



                {{ Form::open(array('url' => 'product/' . $value->id)) }}
                {{ Form::hidden('_method', 'DELETE') }}
                <a class="btn btn-success btn-block" href="{{ URL::to('product/' . $value->id) }}" target="_blank">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /product/{id}/edit -->
                <a class="btn btn-info  btn-block" href="{{ URL::to('product/' . $value->id . '/edit') }}" target="_blank">Edit</a>
                {{ Form::submit('Delete', array('class' => 'btn btn-warning btn-block')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
<hr class="tall" />
<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/admin_product.js')?>"></script>
@stop
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
<div class="container">


    @include('frac.prod_admin_nav')
    <h1>All the product</h1>

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
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>pic</td> <!--pic-->
                <td>{{{ Brand::find($value->brand_id)->name }}}</td>
                <td>{{{ Category::find($value->category_id) }}}</td>
                <td>{{ $value->price}}</td>
                <td>
                    @if($value->availability)
                    <button class="btn btn-small btn-success">O</button>
                    @else
                    <button class="btn btn-small btn-danger">X</button>
                    @endif
                </td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /product/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the nerd (uses the show method found at GET /product/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('product/' . $value->id) }}" target="_blank">Show</a>

                    <!-- edit this nerd (uses the edit method found at GET /product/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('product/' . $value->id . '/edit') }}">Edit</a>

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
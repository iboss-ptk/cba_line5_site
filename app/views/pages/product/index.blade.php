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
    <div class="col-md-8 col-md-offset-2">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('product') }}">Nerd Alert</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('product') }}">View All product</a></li>
                <li><a href="{{ URL::to('product/create') }}">Create a Product</a>
                </ul>
            </nav>

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
                        <td>Email</td>
                        <td>Nerd Level</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->nerd_level }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>

                            <!-- delete the nerd (uses the destroy method DESTROY /product/{id} -->
                            <!-- we will add this later since its a little more complicated than the other two buttons -->

                            <!-- show the nerd (uses the show method found at GET /product/{id} -->
                            <a class="btn btn-small btn-success" href="{{ URL::to('product/' . $value->id) }}">Show</a>

                            <!-- edit this nerd (uses the edit method found at GET /product/{id}/edit -->
                            <a class="btn btn-small btn-info" href="{{ URL::to('product/' . $value->id . '/edit') }}">Edit</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <hr class="tall" />
    <script src="<?php echo asset('vendor/angular.min.js')?>"></script>
    <script src="<?php echo asset('js/admin_product.js')?>"></script>
    @stop
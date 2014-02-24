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


@include('pages.product.frac.nav')

        <div class="col-md-6 col-md-offset-3" style="margin-top:10px">
            <h1>Create a Product</h1>

            <!-- if there are creation errors, they will show here -->
            {{ HTML::ul($errors->all()) }}

            {{ Form::open(array('url' => 'product')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('picture', 'Picture') }}
                {{ Form::text('picture', Input::old('picture'), array('class' => 'form-control')) }}
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



            {{ Form::submit('Create', array('class' => 'btn btn-primary btn-lg btn-block')) }}

            {{ Form::close() }}
        </div>

    </div>
    <hr class="tall" />
    @stop
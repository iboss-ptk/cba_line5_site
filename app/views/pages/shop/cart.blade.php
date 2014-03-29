@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Cart
@stop

@section('content')
<div class="container">
    <div class='row'>
        <div class="col-md-8 col-md-offset-2 ">

            <div class="page-header">
                <h1>Cart</h1>
            </div>

            @if ( Session::get('error') )
            <div class="alert alert-error alert-danger">
                @if ( is_array(Session::get('error')) )
                {{ head(Session::get('error')) }}
                @endif
            </div>
            @endif

            @if ( Session::get('notice') )
            <div class="alert alert-info">{{ Session::get('notice') }}</div>
            @endif

            <table class="table table-striped">

                @foreach($order_list as $order)
                <div class='row'>
                    <div class="col-md-4">
                        <img  alt="{{$order->product->name}}" class="img-responsive" src="{{$order->product->product_pic}}">
                    </div>
                    <div class="col-md-8">
                        <dl>
                          <dt>Brand</dt>
                          <dd>{{$order->product->brand->name}}</dd>
                      </dl>                  

                      <dl>
                          <dt>Product</dt>
                          <dd>{{$order->product->name}}
                            @foreach($order->order_list_attribute->All() as $ol)
                                {{$ol->type}}$nbsp{{$ol->name}}&nbsp
                            @endforeach

                          </dd>
                      </dl>  
                  </div>
              </div>
              <hr>
              @endforeach

          </table>
      </div>
  </div>
</div>
<hr class="tall" />
@stop
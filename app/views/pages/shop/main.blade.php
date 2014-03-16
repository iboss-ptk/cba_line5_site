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
<div class="container" ng-app="shop" ng-controller="ProductCtrl">

	<h2>Portfolio</h2>

	<ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter">
		<li data-option-value="*" class="active"><a href="#">Show All</a></li>
		<li data-option-value=".websites"><a href="#">Websites</a></li>
		<li data-option-value=".logos"><a href="#">Logos</a></li>
		<li data-option-value=".brands"><a href="#">Brands</a></li>
	</ul>

	<hr />

	  <input id="search" ng-focus="" ng-model="search" placeholder="product name..." class="form-control" >
	  <hr />

	<div class="row">
		<!--------------------------------------------edit here!!!------------------------------------------------>

		<ul class="portfolio-list sort-destination" data-sort-id="portfolio">

			<!-- ngrepeat -->
			<li class="col-md-4 isotope-item websites" ng-repeat="product in products">
				<div class="portfolio-price-normal">@{{ product.price}} ฿</div><!-- price -->
				<div class="portfolio-item img-thumbnail">
					<a href="#" class="thumb-info"><!-- open -->
						<img alt="" class="img-responsive" ng-src="@{{product.product_pic}}"><!-- img -->
						<span class="thumb-info-title">
							<span class="thumb-info-inner">@{{ product.name }}</span><!-- name -->
							<div class="thumb-info-type-box"><span class="thumb-info-type">@{{ product.brand }}</span></div><!-- brand -->
						</span>
						<span class="thumb-info-action">
							<div class="thumb-info-action-div">
								<i class="icon icon-search"></i>  Preview
							</div>
							<span title="Buy Me!" href="#" class="thumb-info-action-icon"><i class="icon icon-shopping-cart"></i></span>
						</span>
					</a>
				</div>
			</li>



			
		</ul>

	</div>

</div>

</div>

<hr class="tall" />


<script src="<?php echo asset('vendor/angular.min.js')?>"></script>
<script src="<?php echo asset('js/shop.js')?>"></script>
@stop
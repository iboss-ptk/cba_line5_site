@extends('layouts.default')

@section('meta')
<meta name="keywords" content="CBA" />
<meta name="description" content="">
<meta name="author" content="I'Boss">
@stop

@section('title')
CBA -- Shop
@stop

@section('content')
<div class="container" ng-app="shop" ng-controller="ProductCtrl">

	<h2>Shop </h2>
	<ul class="nav nav-pills" ng-init="cat_id = '{{Input::get('category_id')}}'">
		<li ng-class="{active: isAll}"><a href="shop">All</a></li> 
		<li ng-repeat="category in categories" ng-class="{active: category.isCat}"><a href="shop?category_id=@{{category.id}}"> <span ng-bind="category.name"></span></a></li>
	</ul>

	<hr />

	<input id="search" ng-focus="" ng-model="search" placeholder="product name..." class="form-control" >

	<div>
		<ul class="pager">
			<li class="previous" ng-click="prev()"><a href="">&larr; Previous</a></li>
			<li>Pages :  <span ng-bind="currentPage"></span> /  <span ng-bind="total"></span></li>
			<li class="next" ng-click="next()"><a href="">Next &rarr;</a></li>
		</ul>
	</div>

	<hr />

	<div class="row">

		<ul class="portfolio-list sort-destination" data-sort-id="portfolio">

			<!-- ngrepeat -->
			<li class="col-md-4 isotope-item websites" ng-repeat="product in products ">
				<div class="portfolio-price-normal"> <span ng-bind="product.price"></span> ฿</div><!-- price -->
				<div class="portfolio-item img-thumbnail">
					<a href="#" class="thumb-info" data-toggle="modal" data-target="#@{{product.id}}"><!-- open -->
						<img ng-if="product.product_pic!=='NULL'" alt="@{{product.name}}" class="img-responsive"  ng-src="@{{product.product_pic}}">
						<img ng-if="product.product_pic==='NULL'" alt="@{{product.name}}" class="img-responsive" src="img/projects/project-3.jpg"><!-- img -->
						<span class="thumb-info-title">
							<span class="thumb-info-inner"> <span ng-bind="product.name"></span> </span><!-- name -->
							<div class="thumb-info-type-box"><span class="thumb-info-type"> <span ng-bind="product.brand"></span></span></div><!-- brand -->
						</span>
						<span class="thumb-info-action">
						<!-- 	<div class="thumb-info-action-div">
								<i class="icon icon-search"></i>  Preview
							</div> -->
							<span title="Buy Me!" href="#" class="thumb-info-action-icon"><i class="icon icon-shopping-cart"></i></span>
						</span>
					</a>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="@{{product.id}}" tabindex="-1" role="dialog" aria-labelledby="filterLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="filterLabel">@{{product.name}}</h4>
							</div>
							<div class="modal-body">
								<img alt="@{{product.name}}" class="img-responsive" ng-src="@{{product.product_pic}}"><!-- img -->
								<span class="thumb-info-title">
									<span class="thumb-info-inner">@{{ product.name }}</span><!-- name -->
									<div class="thumb-info-type-box"><span class="thumb-info-type">@{{ product.brand }}</span></div><!-- brand -->
								</span>
							</div>
							<div class="modal-footer">
								<button type="submit" form="" class="btn btn-primary">&nbsp&nbsp&nbsp&nbspสั่งซื้อ <i class="fa fa-shopping-cart fa-lg"></i>&nbsp&nbsp&nbsp&nbsp</button>
							</div>
						</div>
					</div>
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
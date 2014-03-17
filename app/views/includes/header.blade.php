<div class="container">
	<h1 class="logo">
		<a href="{{URL::to('/')}}">
			<img alt="CBA" src="<?php echo asset('img/cbalogo.png')?>">
		</a>
	</h1>
	<div class="search">
		<form id="searchForm" action="page-search-results.html" method="get">
			<div class="input-group">
				<input type="text" class="form-control search" name="q" id="q" placeholder="Search...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><i class="icon icon-search"></i></button>
				</span>
			</div>
		</form>
	</div>

	@if(Auth::check())
	<nav>
		<ul class="nav nav-top">
			<li>
				<a href="#">สวัสดีจ้า  	<b>{{ Confide::user()->username }}</b></a> 
			</li>
			
		</ul>
	</nav>

	@endif
	<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
		<i class="icon icon-bars"></i>
	</button>
</div>
<div class="navbar-collapse nav-main-collapse collapse">
	<div class="container">

		<nav class="nav-main mega-menu">
			<ul class="nav nav-pills nav-main" id="mainMenu">
				<li class="dropdown" id="home">
					<a href="{{URL::to('/')}}">
						Home
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" href="#">
						Shop
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{URL::to('/shop')}}">All</a></li>
						@foreach(Category::All() as $category)
						<li><a href="{{URL::to('/shop?category_id='.$category->id)}}">{{$category->name }}</a></li>
						@endforeach
					</ul>
				</li>

				<li>
					<a class="dropdown-toggle" href="#">
						Secret Tips
					</a>
					
				</li>
				@if(Auth::check()&&Confide::user()->isadmin)
				<li class="dropdown">
					<a class="dropdown-toggle" href="#">
						Manage
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{URL::to('manage_user')}}">User</a></li>
						<li><a href="{{URL::to('product')}}">Product</a></li>
					</ul>
				</li>

				@endif

				@if(Auth::check())
				<li>
					<a href="{{URL::to('user/profile')}}">
						Profile
					</a>
				</li>
				<li>
					<a href="{{URL::to('user/logout')}}">
						Logout
					</a>
				</li>
				@else
				<li class="dropdown">
					<a class="dropdown-toggle" href="#">
						Login
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{URL::to('user/login')}}">Login</a></li>
						<li><a href="{{URL::to('user/create')}}">Register</a></li>
					</ul>
				</li>
				@endif
				
			</ul>
		</nav>
	</div>
</div>

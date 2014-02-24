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
						<li><a href="{{URL::to('/')}}">All</a></li>
						@foreach(Category::All() as $category)
						<li><a href="{{URL::to('/')}}">{{$category->name }}</a></li>
						@endforeach
						
					</ul>
				</li>

				<li class="dropdown mega-menu-item mega-menu-fullwidth">
					<a class="dropdown-toggle" href="#">
						Secret Tips
						<i class="icon icon-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-3">
										<ul class="sub-menu">
											<li>
												<span class="mega-menu-sub-title">Main Features</span>
												<ul class="sub-menu">
													<li><a href="feature-pricing-tables.html">Pricing Tables</a></li>
													<li><a href="feature-icons.html">Icons</a></li>
													<li><a href="feature-animations.html">Animations</a></li>
													<li><a href="feature-typograpy.html">Typograpy</a></li>
													<li><a href="feature-grid-system.html">Grid System</a></li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="sub-menu">
											<li>
												<span class="mega-menu-sub-title">Headers</span>
												<ul class="sub-menu">
													<li><a href="index.html">Header Version 1</a></li>
													<li><a href="index-header-2.html">Header Version 2</a></li>
													<li><a href="index-header-3.html">Header Version 3</a></li>
													<li><a href="index-header-4.html">Header Version 4</a></li>
													<li><a href="index-header-5.html">Header Version 5</a></li>
													<li><a href="index-header-6.html">Header Version 6</a></li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="sub-menu">
											<li>
												<span class="mega-menu-sub-title">Footers</span>
												<ul class="sub-menu">
													<li><a href="index.html#footer">Footer Version 1</a></li>
													<li><a href="index-footer-2.html#footer">Footer Version 2</a></li>
													<li><a href="index-footer-3.html#footer">Footer Version 3</a></li>
													<li><a href="index-footer-4.html#footer">Footer Version 4</a></li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="sub-menu">
											<li>
												<span class="mega-menu-sub-title">Blog</span>
												<ul class="sub-menu">
													<li><a href="blog-full-width.html">Blog Full Width</a></li>
													<li><a href="blog-large-image.html">Blog Large Image</a></li>
													<li><a href="blog-medium-image.html">Blog Medium Image</a></li>
													<li><a href="blog-timeline.html">Blog Timeline</a></li>
													<li><a href="blog-post.html">Single Post</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
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

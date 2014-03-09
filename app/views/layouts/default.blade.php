<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8" ng-app="@yield('ng')"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9" ng-app="@yield('ng')"> <![endif]-->
<!--[if gt IE 9]><!-->	
<html> <!--<![endif]-->
	<head>
		@include('includes.head')
		@yield('ngscript')
		@yield('meta')
		<title>
			@yield('title')
		</title>
		
	</head>
	<body>
		<div class="body">
			
			<header>
				@include('includes.header')
			</header>
			<div role="main" class="main">	
				
				@yield('content')
			</div>
			<footer id="footer">
				@include('includes.footer')
			</footer>

		</div>
		@include('includes.libs')
	</body>
</html>
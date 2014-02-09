<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	
<html> <!--<![endif]-->
	<head>
		@include('includes.head')
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
			@yield('content')

			<footer id="footer">
				@include('includes.footer')
			</footer>
		</div>
	</body>
</html>
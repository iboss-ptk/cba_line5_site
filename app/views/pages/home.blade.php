@extends('layouts.default')

@section('meta')
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
@stop

@section('title')
CBA -- Home
@stop

@section('content')
@include('frac.home.slider')
<div class="container">
	<br/>
	<div class="row center">
		<div class="col-md-12">
			<h2 class="short word-rotator-title">The New Way to <strong class="inverted" data-appear-animation="bounceIn">
				<span class="word-rotate">
					<span class="word-rotate-items">
						<span>success.</span>
						<span>advance.</span>
						<span>progress.</span>
					</span>
				</span>
			</strong>
		</h2>
		<p class="featured lead">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh.
		</p>

		
	</div>

</div>
</div>

<hr class="tall" />
</div>

@stop
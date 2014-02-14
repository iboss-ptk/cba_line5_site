@extends('layouts.default')

@section('meta')
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template - 2.5.0">
	<meta name="author" content="okler.net">
@stop

@section('title')
	test
@stop

@section('content')
				@include('frac.home.slider')
				<div class="container">

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
							<button class="btn btn-primary btn-lg push-top push-bottom" data-toggle="modal" data-target="#loginModal">
								Login
							</button>

							<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Login</h4>
										</div>
										<div class="modal-body">
											
    
    <!-- PAGE HEADER -->
    <div class="page-header"><h1>Login</h1></div>
   
    <!-- FORM -->
    <form name="userForm" ng-submit="submitForm()" novalidate> <!-- novalidate prevents HTML5 validation since we will be validating ourselves -->

        <!-- USERNAME -->
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" ng-model="user.username" ng-minlength="3" ng-maxlength="8">
        </div>
        
        <!-- EMAIL -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" ng-model="email">
        </div>
        
        
    </form>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<hr class="tall" />
				</div>
				
@stop
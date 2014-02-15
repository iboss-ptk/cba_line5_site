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
    <div class="col-md-4 col-md-offset-4">

        <div class="page-header">
            <h1>Sign up</h1>
        </div>

        @if ( Session::get('error') )
        <div class="alert alert-error alert-danger">
            @if ( is_array(Session::get('error')) )
            {{ head(Session::get('error')) }}
            @endif
        </div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{ Session::get('notice') }}</div>
        @endif


        <form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
            
            <div class="form-group">
                <label for="username">{{{ Lang::get('confide::confide.username') }}}</label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
            </div>
            <div class="form-group">
                <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small style="color : red;">({{ Lang::get('confide::confide.signup.confirmation_required') }})</small></label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            </div>
            <div class="form-group">
                <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
            </div>



            <div class="form-actions form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
          </div>

          
      </form>


  </div>
</div>
<hr class="tall" />
@stop
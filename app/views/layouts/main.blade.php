<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Authentication App With Laravel 4</title>
	{{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css')}}
  </head>
 
  <body>
	<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">  
                    <li>{{ HTML::link('users/register', 'Register') }}</li>  
					@if(Auth::check())
						<li>{{ HTML::link('users/logout', 'Logout (' . Auth::user()->email . ')') }}</li>
					@else
						<li>{{ HTML::link('users/login', 'Login') }}</li>  
					@endif
                </ul>  
            </div>
        </div>
    </div> 
	<div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
		 {{ $content }}
    </div>
	
  </body>
</html>
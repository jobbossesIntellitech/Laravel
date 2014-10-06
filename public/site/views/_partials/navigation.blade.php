<ul class="sf-menu header_right">
    <li class="{{ (Route::is('home')) ? 'selected' : null }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ (Route::is('page') and Request::segment(1) == 'about-us') ? 'selected' : null }}"><a href="{{ route('page', 'about-us') }}">About us</a></li>
    <li class="{{ (Route::is('article.list') or Route::is('article')) ? 'selected' : null }}"><a href="{{ route('article.list') }}">Blog</a></li>
    <li class="{{ (Route::is('page') and Request::segment(1) == 'contact') ? 'selected' : null }}"><a href="{{ route('page', 'contact-us') }}">Contact</a></li>
    <li class=""><a href="{{ (Sentry::check()) ? route('logout') : route('login')}}">{{ (Sentry::check()) ? 'logout' : 'login'}}</a></li>
</ul>
<div class="mobile_menu">
	<select>
		<option value="{{ route('home') }}" {{ (Route::is('home')) ? 'selected="selected"' : null }}>HOME</option>
		<option value="{{ route('article.list') }}" {{ (Route::is('article.list') or Route::is('article')) ? 'selected="selected"' : null }} >Blog</option>
		<option value="{{ route('page', 'about-us') }}" {{ (Route::is('page') and Request::segment(1) == 'about-us') ? 'selected="selected"' : null }}>About us</option>
		<option value="{{ route('page', 'contact-us') }}" {{ (Route::is('page') and Request::segment(1) == 'contact') ? 'selected="selected"' : null }}>About us</option>
	</select>
</div>
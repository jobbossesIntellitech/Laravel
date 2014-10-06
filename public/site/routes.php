<?php
 
/*Route::get('/', array('as' => 'home', function() {
    return View::make('site::index');
}));*/
// Home page
Route::get('/', array('as' => 'home', function()
{
	return View::make('site::index')
                ->with('entries', Article::orderBy('created_at', 'desc')->get())
                ->with('sliders', Slider::orderBy('created_at', 'asc')->get())
                ->with('sports', Sport::orderBy('title', 'asc')->get())
                ->with('count','1');
}));

//Login page
Route::get('login', array('as' => 'login', function()
{
    if(!Sentry::check()){
	return View::make('site::login');
    }
    return Redirect::route('home');
}));

Route::post('login', function(){
    
                $credentials = array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password')
                );
 
                try
                {
                        $user = Sentry::authenticate($credentials, false);
 
                        if ($user)
                        {
                                return Redirect::route('home');
                        }
                }
                catch(\Exception $e)
                {
                        return Redirect::route('login')->withErrors(array('login' => $e->getMessage()));
                }
                
});

//Logout Route
Route::get('logout', array('as' => 'logout', function()
{
    if(Sentry::check()){
	Sentry::logout();
    }
    return Redirect::route('login');
}));

// Article list
Route::get('blog', array('as' => 'article.list', function()
{
	return View::make('site::articles')->with('entries', Article::orderBy('created_at', 'desc')->get());
}));

// Single article
Route::get('blog/{slug}', array('as' => 'article', function($slug)
{
	$article = Article::where('slug', $slug)->first();

	if ( ! $article) App::abort(404, 'Article not found');

	return View::make('site::article')->with('entry', $article);
}));

// Single page
Route::get('{slug}', array('as' => 'page', function($slug)
{
	$page = Page::where('slug', $slug)->first();

	if ( ! $page) App::abort(404, 'Page not found');

	return View::make('site::page')->with('entry', $page);

}))->where('slug', '^((?!admin).)*$');

// 404 Page
App::missing(function($exception)
{
	return Response::view('site::404', array(), 404);
});

<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
        public function __construct()
	{       
		/*Get Tweets*/
		View::share('tweets', Helpers::twitterFeed('mackhankins', '10', false, true));
	}

	public function showWelcome()
	{
		return View::make('index');
	}

	public function index(){
			return View::make('index');
	}public function about(){
			return View::make('about');
	}
}
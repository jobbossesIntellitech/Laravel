<?php

class CategoriesController extends BaseController {

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
	
	protected $layout = "layouts.main";
	
	/*
	* Adding In the CSRF Before Filter
	*
	*/
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getCategories')));
		
	}

	/*
	* Default action defined in users
	*
	*/
	public function getIndex()
	{	
		$users = User::all();
		$this->layout->content = View::make('users.index');
	}
	/*
	public function getLogin(){
		if(Auth::check()){
			return Redirect::to('users/dashboard');
		}
		else{
		$this->layout->content = View::make('users.login');
		}
	}
	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}
	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {
        // validation has passed, save user in DB
			
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			$user = User::where('email', '=', $user->email)->first();

			Auth::login($user);
			return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		} else {
			// validation has failed, display error messages    
			
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
         
	}
	
	public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}
	
	public function getDashboard() {
		$this->layout->content = View::make('users.dashboard');
	}
	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
	*/
}
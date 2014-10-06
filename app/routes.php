<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*Route::get('/', function()
{
	return View::make('index');
}); */
/*Route::get('users', function()
{
    return View::make('users');
});*/

Route::get('admin/logout', array('as' => 'admin.logout','uses' =>'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));

Route::post('admin/login', array('as' => 'admin.login.post', 'uses'=>'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
        Route::any('/', 'App\Controllers\Admin\PagesController@index');
	Route::resource('users', 'App\Controllers\Admin\UsersController');
        Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
        Route::resource('pages', 'App\Controllers\Admin\PagesController');
        Route::resource('slider', 'App\Controllers\Admin\SliderController');
        Route::resource('sports', 'App\Controllers\Admin\SportsController');
        Route::resource('agegroups', 'App\Controllers\Admin\AgegroupsController');
        Route::resource('skills', 'App\Controllers\Admin\SkillsController');
});
/*
Route::get('home', 'HomeController@showWelcome');
Route::get('about', 'HomeController@about');
Route::controller('users', 'UsersController'); */
/*Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});*/
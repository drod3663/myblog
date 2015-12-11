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

// Route::get('/', function(){
// 	return Route::action('PostsController@index')
// 	});

// Route::get('homepage', 'HomeController@showHomepage');

Route::get('/', 'HomeController@showHomepage');

Route::get('/posts/manage', 'PostsController@getManage');

Route::get('/posts/list', 'PostsController@getList');
 
Route::resource('posts', 'PostsController');

Route::get('/resume', 'HomeController@showResume');

Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('/about', 'HomeController@showAbout');

Route::get('/contact', 'HomeController@showContact');

Route::get('/whackamole', 'HomeController@showMole');

Route::get('/calculator', 'HomeController@showCalculator');

Route::get('/simplesimon', 'HomeController@showSimon');



Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');




Route::get('/sayhello/{name?}', function($name = null)
{
    return View::make('my-first-view')->with('name', $name);
});

Route::get('/rolldice/{guess}', function ($guess)
{
	//random number
	
	$random = mt_rand(1,6);
	// check if equal to param
	

	if ($guess == $random) {
		return "Correct";
	} else {
		$data = array('guess' => $guess, 'random' => $random);
		return View::make('roll-dice')->with($data);

	}
});









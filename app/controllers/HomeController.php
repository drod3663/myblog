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

	public function showHomepage()
	{
		$posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(3);
		// return View::make('homepage');
		return View::make('homepage', compact('posts', 'pagination'));
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showAbout()
	{
		return View::make('about');
	}

	public function showContact()
	{
		return View::make('contact');
	}

	public function showMole()
	{
		return View::make('whackamole');
	}

	public function showCalculator()
	{
		return View::make('calculator');
	}

	public function showSimon()
	{
		return View::make('simplesimon');
	}

	public function showBorq()
	{
		return View::make('borq');
	}

	public function showAnimate()
	{
		return View::make('animate');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		return Redirect::action('PostsController@index');
		} else {
    		Session::flash('errorMessage', 'Login Failed');
			// Log::info('Validator failed', Input::get('email'));
			
			return Redirect::action('HomeController@showLogin');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Logged Out Successfully');
		return Redirect::action('PostsController@index');
	}
}

<?php

class PostsController extends \BaseController {

public function __construct()
{
	parent::__construct();
	$this->beforeFilter('auth', array('except' => array('index', 'show')));
}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() //FIX THE SEARCH
	{
		// $posts = Post::paginate(4);
		$posts = Post::with('user')->paginate(4);

		$query = Post::with('user');
		$query->orWhereHas('user', function($q)
		{
			$search = Input::get('search');
			$q->where('first_name', 'like', "%$search%");
		});
		$posts = $query->orderBy('created_at', 'desc')->paginate(4);

		
		return View::make('posts.index')->with(array('posts' => $posts));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if($validator->fails()) {
			Session::flash('errorMesage', 'Create Failed');
			Log::info('Validator failed', Input::all());
			return Redirect::back()->withInput()->withErrors($validator);
			
		} else {
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->user_id = Auth::id();  
			// $post->file = Input::file('image'); // PHOTO STUFF
			$post->save();

			Log::info('Post Saved.',Input::all());
			Session::flash('successMessage', 'Created Successfully');
			return Redirect::action('PostsController@index');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		if (isset($post)) {
			return View::make('posts.show')->with('post', $post);
		} else {
			App::abort(404);
		}	

		// $file = Input::file('image');
		// if(Input::hasFile('image')) {
		// 	return $file;

		// }  //PHOTO STUFF

	}
		// 

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		

		$post = Post::find($id);

		return View::make('posts.edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if($validator->fails()) {
			Session::flash('errorMessage', 'Update Failed');
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$post = Post::find($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();

			Session::flash('successMessage', 'Updated Successfully');
			return Redirect::action('PostsController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		
		Session::flash('successMessage', 'Deleted Successfully');
		return Redirect::action('PostsController@index');
		
	}


}

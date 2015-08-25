
@extends('layouts.master')

@section('content')
	


  	{{ Form::token() }}
	{{ Form::open(array('action' => array('PostsController@store'))) }}
        @include('posts.create-edit-form')
    {{ Form::close() }}



	<!-- <form action="{{{ action('PostsController@store') }}}" method="POST">
	

		<input class="form-control" type="text" name="title" value="{{{ Input::old('title') }}}" placeholder="Title" />
		<textarea class="form-control" rows="3" name="body"  placeholder="Body">{{{ Input::old('body') }}}</textarea>

		<button type="submit">Add New Post</button>

	</form> -->

{{ $errors->first('title', '<span class="bg-primary">Please include a title and body</span>') }}
@stop


@extends('layouts.master')

@section('content')
	
 <h1>{{ $post->title }}</h1>
{{ Form::token() }}
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
        @include('posts.create-edit-form')
    {{ Form::close() }}

  
	<!-- <form action="{{{ action('PostsController@update') }}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	

		<input class="form-control" type="text" name="title" value="{{{ Input::old('title') }}}" placeholder="Title" />
		<textarea class="form-control" rows="3" name="body"  placeholder="Body">{{{ Input::old('body') }}}</textarea>

		<button type="submit" <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Submit Edit</button>

	</form> -->

{{ $errors->first('title', '<span class="bg-primary">Please include a title and body</span>') }}
@stop
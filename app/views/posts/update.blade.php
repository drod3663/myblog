@extends('layouts.master')

@section('content')
	


  
	<form action="{{{ action('PostsController@update') }}}" method="POST">
	<input type="hidden" name="_method" value="PUT">
	{{ Form::token() }}

		<input class="form-control" type="text" name="title" value="{{{ Input::old('title') }}}" placeholder="Title" />
		<textarea class="form-control" rows="3" name="body"  placeholder="Body">{{{ Input::old('body') }}}</textarea>

		<button type="submit">Update</button>

	</form>

{{ $errors->first('title', '<span class="bg-primary">Please include a title and body</span>') }}
@stop
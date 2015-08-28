@extends('layouts.master')

<div class="col-md-8">	
@section('content')


<h1>{{ $post->title }}</h1>
	{{ Form::token() }}
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
        @include('posts.create-edit-form')
    {{ Form::close() }}

{{ $errors->first('title', '<span class="bg-primary">Please include a title and body</span>') }}
</div> 

@stop
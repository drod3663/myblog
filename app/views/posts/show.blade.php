@extends('layouts.master')



@section('content')
		<h1> {{{$post->title}}}</h1>
		<p>{{{$post->body}}}</p>
		<h5> <? echo "created: " . $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); ?> </h5>

		<div class="row">
			<div clas="col-md-6">
		<a class="btn btn-primary" href="{{action('PostsController@edit', $post->id)}}">Edit</a>
		<button id="delete" class="btn btn-danger">Delete</button>
		</div>
		</div>
		{{Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete'))}}
		{{Form::close()}}
@stop

@section('script')
	<script>
	(function(){
	"use strict";
	$('#delete').on('click', function(){
		var onConfirm = confirm('Are you sure?');
		if(onConfirm){
			$('#formDelete').submit();
		}
	});
	})();
	</script>
@stop
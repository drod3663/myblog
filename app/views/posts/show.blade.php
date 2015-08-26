@extends('layouts.master')



@section('content')
<div class="content">
		<h1> {{{$post->title}}}</h1>
		<p>{{{$post->body}}}</p>
		<p><em> {{"created by: " . $post->user->first_name }} {{$post->user->last_name}}</em></p>
		<h5> {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }} </h5>
		
		<div class="row">
			<div clas="col-md-6">
		@if(Auth::check())
		<a class="btn btn-primary" href="{{action('PostsController@edit', $post->id)}}">Edit</a>
		<button id="delete" class="btn btn-danger">Delete</button>
		@endif

	
		</div>
		</div>
		{{Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete'))}}
		{{Form::close()}}
@stop
</div>

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
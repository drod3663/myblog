@extends('layouts.master')

@section('content')

<div class="container">
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action('HomeController@showHomepage')}}">TREMENDOUS UPSIDE</a>
          <a class="navbar-brand" href="{{action('PostsController@index')}}">Home</a>
        </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @if(Auth::check())
                <li class="active"><a href="{{action('PostsController@create')}}">Create Post</a></li>
            @endif
            @if(!Auth::check())
                <li><a href="{{action('HomeController@showLogin')}}">Login</a></li>
            @endif
            @if(Auth::check())
                <li><a href="{{action('PostsController@getManage')}}">Manage Posts</a></li>
            @endif
            @if(Auth::check())
                <li><a href="{{action('HomeController@doLogout')}}">Logout</a></li>
            @endif
           <!--  @if(Auth::check())
                <h3><strong><div class="welcome">{{"Welcome"}} {{{Auth::user()->first_name}}} </h3></strong></div>
            @endif -->
        </ul>
            
        
    </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav>
	
	<div class="post-body">
	<h1> {{{$post->title}}}</h1>
	<p>{{{$post->body}}}</p>
	<p><em> {{"created by: " . $post->user->first_name }} {{$post->user->last_name}}</em></p>
	<h5> {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }} </h5>
	
	@if (isset($post->image))
			<img class="responsive" src="/{{ $post->image }}" width="500" height="500" />
		@endif
		
	@if(Auth::check())
		<div class="row">
		<div clas="col-md-6">
			<a class="btn btn-primary" href="{{action('PostsController@edit', $post->id)}}">Edit</a>
			<button id="delete" class="btn btn-danger">Delete</button>
	@endif
		</div>
		</div>
		
	{{Form::open(array('action' =>array('PostsController@destroy', $post->id), 'method' => 'DELETE', 'id' => 'formDelete'))}}
	{{Form::close()}}
	</div> <!-- .post-body -->
</div> <!-- container -->

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
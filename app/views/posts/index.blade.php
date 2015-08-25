@extends('layouts.master')

@section('content')

 

		<h1>Being David Rodriguez</h1> 


		@foreach ($posts as $post)
   			 	<h3>Post Title: {{{$post->title}}}</h3>
   			 	<a href="{{{ action('PostsController@show', $post->id) }}}">Read Post</a>
   		<h5> <? echo "created: " . $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); ?> </h5>
   		@endforeach
  
   		
<a class="btn btn-primary" href="{{action('PostsController@create', $post->id)}}">Create Post</a>
{{ $posts->links() }}
@stop

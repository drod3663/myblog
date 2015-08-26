@extends('layouts.master')


@section('content')

<div class="content">
@if(Auth::check())
<h3><strong>{{"Welcome"}} {{{Auth::user()->first_name}}} {{{Auth::user()->last_name}}}</h3></strong>
@endif

<form>
<div class="form-group @if($errors->has('title')) has-error @endif">
    {{ Form::label('search posts', 'Search Posts') }}
    {{ Form::text('search', null, ['class' => 'form-control']) }}
</div>
</form>

		
		



		@foreach ($posts as $post)
			<h2><a href="{{{ action('PostsController@show', $post->id) }}}">Post Title: {{{$post->title}}}</a></h2>
   			<!-- <h3>Post Title: {{{$post->title}}}</h3> -->
   			{{{Str::words($post->body, 20)}}}
   			<p><em> {{"created by: " . $post->user->first_name }} {{$post->user->last_name}}</em></p>
   			<h5> {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }} </h5>
   			
			<!-- <a href="{{{ action('PostsController@show', $post->id) }}}">Read Post</a> -->
   		@endforeach
  
<!-- @if (Auth::check()) {
   <a class="btn btn-primary" href="{{action('HomeController@doLogout')}}">Logout</a>
} else {
    <a class="btn btn-primary" href="{{action('HomeController@showLogin')}}">Login</a>
}
@endif -->

<!-- @if(!Auth::check())
<a class="btn btn-primary" href="{{action('HomeController@showLogin')}}">Login</a>
@endif
@if(Auth::check())
	<a class="btn btn-primary" href="{{action('HomeController@doLogout')}}">Logout</a>
@endif -->

{{ $posts->links() }}
</div>
@stop

@extends('layouts.master')

@section('content')
<div class="content">
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
<div class="col-md-8">
<div class="content">

	{{ Form::token() }}
	{{ Form::open(array('action' => array('HomeController@doLogin'))) }}
        
   

<div class="form-group @if($errors->has('email')) has-error @endif">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('password')) has-error @endif">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', null, ['class' => 'form-control']) }}
</div>

<button class="btn btn-primary">Submit</button>
 	{{ Form::close() }}

</div>
</div>
@stop 

	





	@extends('layouts.master')
    @section('title')
    About
    @stop

    @section('style')
    <style>
    	body {
    		background-color: #f2f2f2;
		}
	</style>
	@stop

    
    <div class="content">
    <div class="container">
	@section('content')
	<!-- Static navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{action('HomeController@showHomepage')}}">TREMENDOUS UPSIDE</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
            <li><a href="{{action('HomeController@showAbout')}}">About</a></li>
            <!-- <li><a href="{{action('HomeController@showPortfolio')}}">Works</a></li> -->
            <li><a href="{{action('PostsController@index')}}">Blog</a></li>
            <li><a href="{{action('HomeController@showResume')}}">Resume</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	
		<h1>I'm a man of few words....any questions?</h1>
	
	<p>
		<h3>
			Pretty much sums me up. I have a wide range of interests from movies, music, sports, learning, tv shows, books, food and 
			traveling. I got into web development after working for nine years at Chick-fil-A and deciding I needed a new challenge. 
			I could go on and on and about myself but I dont want to bore you. Like I said I'm a man of few
			words and if you have any questions please feel free contact me at drod63@gmail.com
		</h3>
	</p>
	</div>
	
	
	</div>
	@stop

	@section('script')
	
	@stop

	
    
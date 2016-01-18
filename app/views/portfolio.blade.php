@extends('layouts.otherpages')
@section('title')
<title>Portfolio</title>
@stop


@section('content')
	<!-- <div class="row">
	<div clas="col-md-6">
			<a class="btn btn-primary" href="{{action('HomeController@showMole')}}">View</a>
			<button id="delete" class="btn btn-danger">Delete</button>
	</div>
	</div> -->

	<!-- <div class ="row">
	<div class="col-md-6">
		<a id="mole" class="btn btn-primary btn-md" href="{{action('HomeController@showMole')}}" role="button">Whack-A-Lebron &raquo;</a>
		<img src=""
		<a id="calculator" class="btn btn-primary btn-md" href="{{action('HomeController@showCalculator')}}" role="button">Calculator &raquo;</a>
   		<a id="simon" class="btn btn-primary btn-md" href="{{action('HomeController@showSimon')}}" role="button">Simple Simon &raquo;</a>
	</div>
	</div> -->

	<div class="section">
	<strong><h2>Borq Gaming</h2></strong>
	<p><h4>Created as my final project along with two others, we were able to apply
	what we learned to creat this text adventure game modeled after the 80s classic, Zork. Sadly our game is no longer up online to 
	play, but you can check out the source code here on <a href="https://github.com/Borq-Gaming/borq.dev">Github.</a></h4></p>
	<br>
	<strong><h2>tremendousupside.com</h2></strong>
	<p><h4>My current website. I wanted to include this because because I purchased this domain years ago before I even planned on 
	becoming a developer in hopes of bringing it to life. </h4></p>
	<br>
	<strong><h2>Laravel blog project</h2></strong>
	<p><h4>The link to this blog is located on the main page. Aptly named Silent Earth due to my quiet nature, we created this using the
	Laravel framework. </h4></p>
	<br>
	<strong><h2><a href="{{action('HomeController@showMole')}}">Shoot Til You Miss</a></h2></strong>
	<p><h4>My twist on the classic Whack-A-Mole. Shoot the ball in the hoop until you miss.</h4></p>
	<br>
	<strong><h2><a href="{{action('HomeController@showSimon')}}">Simple Simon</a></h2></strong>
	<p><h4>Pretty self explanatory. See how far you can go.</h4></p>
	<br>

	</div>
@stop
 

    

    
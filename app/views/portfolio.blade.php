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

	<div class ="row">
	<div class="col-md-6">
		<a id="mole" class="btn btn-primary btn-md" href="{{action('HomeController@showMole')}}" role="button">Whack-A-Lebron &raquo;</a>
		<img src=""
		<a id="calculator" class="btn btn-primary btn-md" href="{{action('HomeController@showCalculator')}}" role="button">Calculator &raquo;</a>
   		<a id="simon" class="btn btn-primary btn-md" href="{{action('HomeController@showSimon')}}" role="button">Simple Simon &raquo;</a>
	</div>
	</div>
@stop
 

    

    
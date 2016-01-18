@extends('layouts.simon')

    @section('title')
    Simple Simon
    @stop
    
    @section('style')
    
    <link rel="stylesheet" href="/css/simon.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	@stop

    

	@section('content')
	<div id='center'>
	<div class='content black' id='backColor'>
		
		<div class='box' id='green'></div>
		<div class='box' id='red'></div>
		<div class='box' id='blue'></div>
		<div class='box' id='yellow'></div>
	<button class='start btn btn-lrg btn-primary btn-block'  id='start'>let's play!</button>
	<button class='btn-block' id='round'>round</button>
	</div>
	</div>
	@stop

	<!-- @section('style')
	<script>
	
	'use strict';
	var simonInput = []
	var userInput = []
	var buttons = $('.box')
	
	function animateBox(id) {
		$('#' + id).animate({opacity:1,}, 200,
			function(){
				$('#' + id).animate({
					opacity:0.4,},200);
				})
			};
		
	
	buttons.click(function(){
		animateBox(this.id);
		userInput.push(this.id);
		console.log(this.id)
		
	});
	function simonSequence(){
		simonInput = [];
		userSequence();
		
	}
	function userSequence(){
		userInput = [];
		randomBox();
		playBack();
	}
	function randomBox(){
		var random = Math.floor(Math.random() * 4)
		simonInput.push(buttons[random].id);
		//animateBox(buttons[random].id);
		console.log(this);
	}
	function playBack() {
		
	    disableInput();
	    $('#round').text("round # " + simonInput.length);
	    var i = 0;
	    var intervalId = setInterval(function() {
	        animateBox(simonInput[i]);
	        i++;
	        if (i >= simonInput.length) {
	            clearInterval(intervalId);
	       
            enableInput();
	        }
	    }, 600);
	}
	function compareArrays() {
	    var sequenceMistake = false;
	    
	    for (var i = 0; i < userInput.length; i++) {
	    	
	      if (simonInput[i] != userInput[i]) {
	        sequenceMistake = true;
	        break;
	      }
	    }
	    if (sequenceMistake) {
	      gameOver();
	    } else if (userInput.length == simonInput.length) {
	      
	      userSequence();
	      
	    }
	}
	function gameOver() {
	    location.reload(true);
    	alert('  ' + simonInput.length + ' rounds? thats it?')
	}
	function userClick(id) {
	    animateBox(id.target.id);
	    var userChoice = $(this).attr('id');
	    userInput.push(userChoice);
	    compareArrays();
	}
	function enableInput() {
    $('#blue').click(userClick);
    $('#yellow').click(userClick);
    $('#red').click(userClick);
    $('#green').click(userClick);
	}
	function disableInput() {
    $('#blue').off('click');
    $('#yellow').off('click');
    $('#red').off('click');
    $('#green').off('click');
	}
		
	$('#start').click(simonSequence);
	</script>
	@stop -->
	@section('script')
	<script>
	
	'use strict';
	$(document).ready(function(){
	var simonInput = []
	var userInput = []
	var buttons = $('.box')
	
	function animateBox(id) {
		$('#' + id).animate({opacity:1,}, 200,
			function(){
				$('#' + id).animate({
					opacity:0.4,},200);
				})
			};
		
	
	buttons.click(function(){
		animateBox(this.id);
		userInput.push(this.id);
		console.log(this.id)
		
	});
	function simonSequence(){
		simonInput = [];
		userSequence();
		
	}
	function userSequence(){
		userInput = [];
		randomBox();
		playBack();
	}
	function randomBox(){
		var random = Math.floor(Math.random() * 4)
		simonInput.push(buttons[random].id);
		//animateBox(buttons[random].id);
		console.log(this);
	}
	function playBack() {
		
	    disableInput();
	    $('#round').text("Round # " + simonInput.length);
	    var i = 0;
	    var intervalId = setInterval(function() {
	        animateBox(simonInput[i]);
	        i++;
	        if (i >= simonInput.length) {
	            clearInterval(intervalId);
	       
            enableInput();
	        }
	    }, 600);
	}
	function compareArrays() {
	    var sequenceMistake = false;
	    
	    for (var i = 0; i < userInput.length; i++) {
	    	
	      if (simonInput[i] != userInput[i]) {
	        sequenceMistake = true;
	        break;
	      }
	    }
	    if (sequenceMistake) {
	      gameOver();
	    } else if (userInput.length == simonInput.length) {
	      
	      userSequence();
	      
	    }
	}
	function gameOver() {
	    location.reload(true);
    	alert('  ' + simonInput.length + ' rounds? thats it?')
	}
	function userClick(id) {
	    animateBox(id.target.id);
	    var userChoice = $(this).attr('id');
	    userInput.push(userChoice);
	    compareArrays();
	}
	function enableInput() {
    $('#blue').click(userClick);
    $('#yellow').click(userClick);
    $('#red').click(userClick);
    $('#green').click(userClick);
	}
	function disableInput() {
    $('#blue').off('click');
    $('#yellow').off('click');
    $('#red').off('click');
    $('#green').off('click');
	}
		
	$('#start').click(simonSequence);
	});
	</script>
@stop
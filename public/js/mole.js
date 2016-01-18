
	'use strict';
	$(document).ready(function(){
	var random
	var intervalId
	var score = 0
	var interval = 1000
	var done = $('.second')
	
	//this function adds/removes class to populate div box. 
	function popupBox() {
		disable();
		enable();
		$('#score').val("Score: " + score);	
		console.log('hello')
		random = Math.floor(Math.random() * 9)
			$('#' + random).addClass('box')
		setTimeout(function(){ 
			$('#'+ random).removeClass('box')
			},interval);
		playBack();
	};
			
	//calls back popUpBox function at a set interval
	function playBack() {
		clearInterval(intervalId);
	    intervalId = setInterval(function() {
	        popupBox();
	    }, interval);
	};
	
	function enable() {
		$('.mole').on('click', makeItDisappear);
	};
	function disable(){
		$('.mole').off('click');
	}
			
	//removes class from defined in css and adds score  
	function makeItDisappear() {
		if($(this).hasClass('box')){
			$(this).removeClass('box');
			console.log('it works')
			score = score + 2
	    	$('#score').val("score: " + score);
	    	speedUp();
		} else {
			gameOver();
		}
	};
	//causes 'mole' to appear quicker everytime its successfully clicked
	function speedUp() {
		
		interval = interval - 50
		console.log('faster')
	}
		
	//alerts when clicked outside of 'mole'
	function gameOver() {
			
			alert('You Missed! Game Over!')
			console.log('You Missed! Game Over!')
		
		location.reload(true);
	}
	        
		
$('#start').click(popupBox);
	});

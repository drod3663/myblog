"use strict";

// TODO:  test start animation change #id's to fit buttons and div names.  resize mvt as needed
$(document).ready(function (){
	var start = true;
	$('#button').click(function() {
		if (start) {
			$('#effect').animate({
				left: "-=300px",
				top: "-=200px"
			}, 1000)

		} else {
			$('#effect').animate({
				left: "+=300px",
				top: "+=200px"
			}, 1000)
		}
		start = false;
	});
});
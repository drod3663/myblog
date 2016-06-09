"use strict";

(function() {
	var app = angular.module("textBox", []);

	app.controller("textController", ["$log", "$http", function($log, $http) {
		$(document).ready(function() {


			// refocus
			$('body').on("click", function() {
				console.log("focus")
				$('#RealTextbox').focus();
			});

			
			// console
			$('#RealTextbox').keyup(function(e) {
				var code = (e.keyCode ? e.keyCode : e.which);
				// Enter key?
				if(code == 13) {
					userInput();
					// Don't put a newline if this is the first command
					if ($('#PastCommands').html() != '') {
						$('#PastCommands').append('<br />');
					}
					$('#PastCommands').append("> " + $(this).val());
					$(this).val('');
					$('#FakeTextbox').text('');

					//to call each turn
					setTimeout(function(){
						turnCheck();
						locationDisplay();
						itemDisplay();
						setTimeout(function(){
							healthUpdate();
						}, 100)
					}, 100)

				} else {
					$('#FakeTextbox').html($(this).val());
				}
			});
			$('#RealTextbox').focus();
		});
		var firstAction; // to make global
		function userInput() {
			var input = $("#RealTextbox").val();
			console.log(input);
			var selectInput = input.split (' ');
			firstAction = selectInput[0];
			var secondAction = selectInput[1];
			if (selectInput[2]) {
				console.log(selectInput);
				determineCommand(firstAction, secondAction, selectInput[3])
			} else {
				determineCommand(firstAction, secondAction);
			}
		}
		function turnCheck() {
			console.log(firstAction);
			$http.post("turn/check", {
				lastcommand: firstAction
			}).then(function(data) {
				$log.info("Dat Info was sent to the server successfully!");
				console.log(data);
				display(data.data);
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		function determineCommand(command, value, valueB) {
		if (!valueB) {
			valueB = null;
		}
			switch (command.toLowerCase()) {
				case "move":
					return ajaxMove(value);
				break;
				case "eat":
					return ajaxEat(value);
				break;
				case "hit":
					return ajaxHit(value);
				break;
				case "use":
					return ajaxUse(value, valueB);
				break;
				case "take":
					return ajaxTake(value);
				break;
				default: setTimeout(function(){display("Command not valid.")}, 100);
			}
		}

		function display(text) {
			$('#PastCommands').append('<br />');
			$('#PastCommands').append(text);
			$("#textBox").scrollTop($("#textBox")[0].scrollHeight);
		}

		function ajaxMove(value) {
			$http.post("move/" + value).then(function(data) {
				$log.info("Info was sent to the server successfully!");
				console.log(data);
				display(data.data);
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		function ajaxTake(item) {
			$http.post("take/take", {
				thing: item
			}).then(function(data) {
				$log.info("Info was sent to the server successfully!");
				display(data.data);
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		function ajaxHit(value) {
			$http.post("hit/" + value).then(function(data) {
				$log.info("Info was sent to the server successfully!");
				display(data.data);
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		function ajaxEat(item) {
			$http.post("eat/food", {
				food: item
			}).then(function(data) {
				$log.info("Info was sent to the server successfully!");
				display(data.data);
				console.log(data)
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		function ajaxUse(value1, value2) {
			$http.post("use/stuff", {
				item1: value1,
				item2: value2
			}).then(function(data) {
				$log.info("Info was sent to the server successfully!");
				display(data.data);
			}, function(response) {
				$log.error("Ajax request failed for some reason!");

				$log.debug(response);
			});
		}

		// Display Functions
		function locationDisplay() {
			$.get('move/index').done(function(data) {
				console.log(data);	
				// Display Name
				$('#current_location').val(data.display_name);
				imageDisplay(data);
			});
		};

		// Background Image Display
		function imageDisplay(data) {
			var background_image = 'url(/' + data.image + ')';
			$('body').css('background-image', background_image);
		};

		// update health
		function healthUpdate(){
			$.get('home/health').done(function(data) {
			    	console.log(data);
			    $( "#health_bar" ).progressbar({
				      value: data * 10
			    });
			 });
		}

		// Item Icon Display
		function itemDisplay() {
			$.get('home/items').done(function(data) {
				console.log(data);

				$('#items').empty();

				if (data.key == 1) {
					$('#items').append('<img src="/images/key.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.sword == 1) {
					$('#items').append('<img src="/images/sword.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.armor == 1) {
					$('#items').append('<img src="/images/armor.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.lantern == 1) {
					$('#items').append('<img src="/images/lantern.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.apple == 1) {
					$('#items').append('<img src="/images/apple.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.bread == 1) {
					$('#items').append('<img src="/images/bread.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.wine == 1) {
					$('#items').append('<img src="/images/wine.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.note == 1) {
					$('#items').append("");
					$('#items').append('<img src="/images/note.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.gown == 1) {
					$('#items').append('<img src="/images/gown.png"' + '" width="25px" height="25px"/> &nbsp;');
				}

				if (data.crown == 1) {
					$('#items').append('<img src="/images/crown.png"' + '" width="25px" height="25px"/> &nbsp;');
				}
			}); // end of item display
		};
	}]);
})();  
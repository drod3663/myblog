<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <link href="http://code.jboxcdn.com/0.3.2/jBox.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/css/textbox.css">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="/css/borq.css">

    
    <title>Borq</title>
</head>

<body ng-app="textBox">
<div id="borq_image">
    <img src="/img/Borq.png" alt="borq logo"/>
</div>
    

<div id="instructions">
    <a href="" span style="cursor: pointer" id="myModal2">
    <img src="/img/instructions.png">
    </a></span>
</div>


<div class="container col-sm-12" id="game_box" style="display: none;">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1 col-md-offset-3 col-md-6 col-md-offset-3">

            <div class="row">
                <div id="location" class="col-sm-6">
                    <div id="label_location">
                    <img src="/img/location4.png" width="225" height="55"/>
                    </div>
                    <!-- <label class="label" id="location_label" for="location">Location</label></br> -->
                    <input id="current_location" disabled>
                </div>

                <div id="health" class="col-sm-6">
                    <div id="label_health">
                        <img src="/img/health4.png" width="225" height="50"/>
                    </div>
                    <!-- <label class="label" for="health">Health</label> -->
                    <div id="health_bar"></div>
                </div>

            </div>

            <div class='row'>
                <div class='form-group col-sm-12'>
                    <div name="items" for="items">
                        <div id="label_items">
                        <img src="/img/inventory4.png" width="225" height="55" />
                        </div>
                        <!-- <label class="label" class="form-group" id="item_label" name="items">Inventory</label> -->
                        <div id='items'></div>
                    </div>
                </div>
            </div>

            <!--  Console Text Box -->
            <div id="console_outer">
                <div id="text_wrapper">
                    <div ng-controller="textController">
                        <div id="textBox">

                            <div id="PastCommands">
                                It started out as a drunk boast, or something like that. In the grand scheme of things, it doesn't really matter. What matters is that you are here, and you are trying to steal the king's crown. You are having second thoughts as you approach the castle. But you said you would, so what can you do? You've heard that the crown is kept in the king's sleeping chamber when he is not wearing it. Its a quarter past really late, so thats where you decide to look for it. Now to just find your way there. <br><br>
                                You see the courtyard before you.  To the east is a tower entrance.  To the west is another tower entrance.  North of you, you see a large statue in a fountain (thats a strange fixture for a castle), and beyond that, the entrance to the castle.  It looks like the entrance is guarded by 2 soldiers.
                            </div>
                                > <span id="FakeTextbox"></span><span id="Score">_</span>
                                    <input type="text" id="RealTextbox" autofocus>
                        </div>
                    </div>
                </div>
            </div> <!-- end of console -->
        </div>
    </div>
</div>


<div class="form-group container">

    <div id="start_container">  
        <a type="submit" id="start"><img src="/img/shield1 copy.png" width="300" height="300"/></a>
    </div>

</div>


    

<div style="display: none;" id="grabMe">
    <strong>Objective:</strong> Explore your way through the castle and steal the king's crown.<br>
    <br>
    <strong>Commands</strong><br>
    <strong>Hit</strong> - When you encounter a guard and wish to engage simply type the command "hit guard" <br>
    <strong>Use</strong> - When you have an item is available for use type command "use [item] on [thing] (e.g. use key on door)"<br>
    <strong>Eat</strong> - When food is available in your items type command "eat [food] (e.g. eat apple)"<br>
    <strong>Move</strong> - To make your way through the castle type command "move [direction]" (e.g. move north)<br>
    <strong>Take</strong> - To add an item to your inventory type command "take [item]" (e.g. take crown)<br>
</div>


   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.6/angular.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://code.jboxcdn.com/0.3.2/jBox.min.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="/js/borq.js"></script>

<script>

$(document).ready(function() {
    // REVISED INSTRUCTION MODAL AS AN IMAGE
    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });
    // Instruction Modal
    var myModal2;
    myModal2 = $('#myModal2').jBox('Modal', {

        title: 'Instructions',
        content: $('#grabMe')
    });
    
    $.get('/start').done(function(){
        console.log('Game Initialized');
    });

    // Start Game animation
    $('#start_container').css('cursor', 'url(/img/cursor-sword.png), auto');

    $('#start').click(function(){
        
        var gameBox = function () {
            $('#game_box').fadeIn(800);
        };

        var startContainer = function() {
            $('#start_container').fadeOut(700);
            $('#start').prop('disabled', true);
        };

        startContainer();
        setTimeout(gameBox, 800);

    });

    
    
});

</script>

<footer class="footer">
    <div class="container">
        <a href="https://github.com/Borq-Gaming/borq.dev">
        <img src="/img/about.png">
        </a>
    </div>
</footer>
</body>
</html>
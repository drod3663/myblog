<!DOCTYPE html>
<html>
<head>
    <title>Animate</title>
    <style>
        html, body {
            margin: 0px;
            padding: 0;
        }
        #btn-animate {
            margin: 15px;
        }
        .box {
            background-color: #000033;
            height: 250px;
            margin: 15px;
            position: relative;
            width: 250px;
        }
    </style>
</head>
<body>

    <p>
        <button id="btn-move">Move It</button>

        <button id="btn-scale-down">Scale It</button>

        <button id="btn-disappear">Disappear It</button>

        <button id="btn-show">Show It</button>

        <button id="btn-all">Animate all</button>
    </p>

    <div id="animate-box" class="box"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        'use strict';
        $(document).ready(function(){
        // todo: Move the box by 100 pixels from the left
            $('#btn-move').click(function(){
                $('.box').animate({
                    left: '+=100',
                })
            })
            
            // todo: Scale the width up by 50%
            $('#btn-scale-down').click(function(){
                $('.box').animate({
                    width: '+=50%',
                }, 1000)
            })
            // todo: Use opacity to make the box invisible
            $('#btn-disappear').click(function(){
                $('.box').animate({
                    opacity: 0,
                })
            })
            // todo: Make the box appear again with opacity
            $('#btn-show').click(function(){
                
                $('.box').animate({
                     opacity: 1,
                 })
            })
            // todo: Once all is done see if you can chain all the animations
            $('#btn-all').click(function(){
                $('.box').animate({
                    left: '+=50',
                    width: '+=25%',
                    opacity: 0
                 }, 2500)   
                $('.box').animate({
                    left: '+=50',
                    width: '+=12.5%',    
                    opacity: 1,
                }, 2500)
                
            })
            // to happen with the `Animate all` button.
            // Refresh to start over before hitting the button.
            
        });
    
    </script>
</body>
</html>
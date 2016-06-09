<!DOCTYPE html>

<html>

<head>
    <title>Calculator</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/calculator.css">
    
</head>

<body>
    <section>
        <div id="container" class="col-md-12">
            <div id="display">
                <div class="row">
                    <input id="leftTextBox" class="textBoxes" name="left" type="text" readonly>

                    <input id="middleTextBox" class="textBoxes" name="middle" type="text" readonly>
                    
                    <input id="rightTextBox" class="textBoxes" name="right" type="text" readonly>
                </div>

            </div>

            <div id="buttons">
                <div class="row">
                    <button id="clear" class="clearButton button">C</button>
                    <!-- <div class="solarPanel">
                        <img class="solarPanel" src="/img/solar_panels.jpg">
                    </div> -->
                </div>

                <div class="row">
                    <button id="numOne" class="numButton button">1</button>

                    <button id="numTwo" class="numButton button">2</button>

                    <button id="numThree" class="numButton button">3</button>

                    <button id="add" class="opButton button">+</button>
                </div>

                <div class="row">
                    <button id="numFour" class="numButton button">4</button>

                    <button id="numFive" class="numButton button">5</button>

                    <button id="numSix" class="numButton button">6</button>

                    <button id="subtract" class="opButton button">-</button>
                </div>

                <div class="row">
                    <button id="numSeven" class="numButton button">7</button>

                    <button id="numEight" class="numButton button">8</button>

                    <button id="numNine" class="numButton button">9</button>

                    <button id="multiply" class="opButton button">*</button>
                </div>

                <div class="row">
                    <button id="decimal" class="button button">.</button>
                    
                    <button id="numZero" class="numButton button">0</button>

                    <button id="equal" class="equalButton button">=</button>

                    <button id="divide" class="opButton button">/</button>
                </div>

            </div>
        </div>
    </section>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="/js/calculator.js"></script>
    


</body>
</html>
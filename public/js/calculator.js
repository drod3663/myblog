'use strict';

//declare buttons
var oneBtn = document.getElementById('numOne');
var twoBtn = document.getElementById('numTwo');
var threeBtn = document.getElementById('numThree');
var fourBtn = document.getElementById('numFour');
var fiveBtn = document.getElementById('numFive');
var sixBtn = document.getElementById('numSix');
var sevenBtn = document.getElementById('numSeven');
var eightBtn = document.getElementById('numEight');
var nineBtn = document.getElementById('numNine');
var zeroBtn = document.getElementById('numZero');
var decimalBtn = document.getElementById('decimal');
var addBtn = document.getElementById('add');
var subtractBtn = document.getElementById('subtract');
var multiplyBtn = document.getElementById('multiply');
var divideBtn = document.getElementById('divide');
var equalBtn = document.getElementById('equal');
var clearBtn = document.getElementById('clear');

var leftDisplay = document.getElementById('leftTextBox');
var middleDisplay = document.getElementById('middleTextBox');
var rightDisplay = document.getElementById('rightTextBox');


//get numbers in display

function calcOperations (){
    console.log(this);
    if (middleDisplay.value == "") {
        leftDisplay.value += this.innerText
    } else {
        rightDisplay.value += this.innerText
    }
}

oneBtn.addEventListener('click', calcOperations);

twoBtn.addEventListener('click', calcOperations);

threeBtn.addEventListener('click', calcOperations);

fourBtn.addEventListener('click', calcOperations);

fiveBtn.addEventListener('click', calcOperations);

sixBtn.addEventListener('click', calcOperations);

sevenBtn.addEventListener('click', calcOperations);

eightBtn.addEventListener('click',calcOperations);

nineBtn.addEventListener('click', calcOperations);

zeroBtn.addEventListener('click', calcOperations);

decimalBtn.addEventListener('click', calcOperations);

//calc functions in display

addBtn.addEventListener('click', function (event) {
    middleDisplay.value = '+';
});

subtractBtn.addEventListener('click', function (event) {
    middleDisplay.value = '-';
});

multiplyBtn.addEventListener('click', function (event) {
    middleDisplay.value = '*';
});

divideBtn.addEventListener('click', function (event) {
    middleDisplay.value = '/';
});

//clear display when 'C' is clicked on

clearBtn.addEventListener('click', function(){
    leftDisplay.value = "";
    middleDisplay.value = "";
    rightDisplay.value = "";
});

//equal - display answer in leftTextBox

equalBtn.addEventListener('click', function equals () {
    if (middleDisplay.value == "+"){
        leftDisplay.value = parseFloat(leftDisplay.value) + parseFloat(rightDisplay.value);
    } else if (middleDisplay.value == "-"){
        leftDisplay.value = parseFloat(leftDisplay.value) - parseFloat(rightDisplay.value);
    } else if (middleDisplay.value == "*"){
        leftDisplay.value = parseFloat(leftDisplay.value) * parseFloat(rightDisplay.value);
    } else if (middleDisplay.value == "/"){
        leftDisplay.value = parseFloat(leftDisplay.value) / parseFloat(rightDisplay.value);
    }
    middleTextBox.value = "";
    rightDisplay.value = "";
});
   
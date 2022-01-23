<?php 

// Задание_1


$a = 1;
$b = 2;

if($a>=0 && $b>=0) {
	echo "{$a} и {$b} положительные";
} 
else if($a<0 && $b <0) {
	echo "{$a} и {$b} отрицательные";
} 
else if(($a>=0 && $b<0)||($a<0 && $b>=0)) {
	echo "{$a} и {$b} разных знаков";
}

print"<br><hr>";


// Задание_2


$a = rand(0,15);

switch($a) {
	case(0):
		echo $a++ . " ";
		//break;
	case(1):
		echo $a++ . " ";
		//break;
	case(2):
		echo $a++ . " ";
		//break;
	case(3):
		echo $a++ . " ";
		//break;
	case(4):
		echo $a++ . " ";
		//break;
	case(5):
		echo $a++ . " ";
		//break;
	case(6):
		echo $a++ . " ";
		//break;
	case(7):
		echo $a++ . " ";
		//break;
	case(8):
		echo $a++ . " ";
		//break;
	case(9):
		echo $a++ . " ";
		//break;
	case(10):
		echo $a++ . " ";
		//break;
	case(11):
		echo $a++ . " ";
		//break;
	case(12):
		echo $a++ . " ";
		//break;
	case(13):
		echo $a++ . " ";
		//break;
	case(14):
		echo $a++ . " ";
		//break;
	case(15):
		echo $a . "<br><hr>";
		break;
}


// через рекурсию

function numRange($a) {
	echo $a  . " ";
	if($a<15) {
		numRange($a+1);
	}
}

$a = rand(0,15);
numRange($a);

print"<br><hr>";


// Задание_3


function sum($a,$b) {
	return "{$a} + {$b} = " . ($a+$b) . "<br>";
}
function diff($a,$b) {
	return "{$a} - {$b} = " . ($a-$b) . "<br>";
}
function mult($a,$b) {
	return "{$a} * {$b} = " . ($a*$b) . "<br>";
}
function quot($a,$b) {
	return ($b!=0) ? "{$a} : {$b} = " . ($a/$b) . "<br>" : "Warning: Деление на ноль недопустимо!<br>";
} 

echo sum(31,11);
echo diff(55,13);
echo mult(7,6);
echo quot(84,0);
echo quot(84,2);

print"<hr>";


// Задание_4


function mathOperation($arg1,$arg2,$operation) {
	switch($operation) {
		case "sum":
			return sum($arg1,$arg2);
			break;
		case "diff":
			return diff($arg1,$arg2);
			break;
		case "mult":
			return mult($arg1,$arg2);
			break;
		case "quot":
			return quot($arg1,$arg2);
			break; 
		default:
			return "Wrong operation!";
			break;
	}
}

echo mathOperation(21,21,"sum");
echo mathOperation(56,14,"diff");
echo mathOperation(21,2,"mult");
echo mathOperation(84,2,"quot");
echo mathOperation(16,2,"err");

print"<hr>";


// вариант advanced

function mathOperationAdv($arg1,$arg2,$operation) {
		return ($operation == "sum"||$operation === "diff"||$operation === "mult"||$operation === "quot") ? $operation($arg1, $arg2) : "Wrong operation!";
}

echo mathOperationAdv(21,22,"sum");
echo mathOperationAdv(56,14,"diff");
echo mathOperationAdv(21,2,"mult");
echo mathOperationAdv(84,2,"quot");
echo mathOperationAdv(16,2,"err");

print"<hr>";
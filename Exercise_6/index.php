<?php 

// Задание_6

$val = 3;
$n = 10;  		
				
// поочерёдно возводим число $val в степень от 0 до $n включительно

function power($val,$pow = 0) {
	$result = $val ** $pow;
	echo "{$val} <sup>{$pow}</sup> = {$result}<br>";
	global $n;
	if($pow < $n) {	
		power($val,++$pow); 
	}	
}
print "Число <b>{$val}</b> в степени <b>0 - {$n}</b>: <br><br>";
power($val);






<?php

// Задание_7

// долго пытался написать в один if, но не удалось

function curTime() {
	$hour = date('H');
	$min = date('i');
	
	if(($hour[1]==1)&&($hour[0]!=1)) {
		$h = " час "; 
	} else if((($hour[1]==2)||($hour[1]==3)||($hour[1]==4))&&($hour[0]!=1)) {
		$h = " часа "; 
	} else {
		$h = " часов ";	
	}	
	
	if(($min[1]==1)&&($min[0]!=1)) {
		$m = " минута "; 
	} else if((($min[1]==2)||($min[1]==3)||($min[1]==4))&&($min[0]!=1)) {
		$m = " минуты "; 
	} else {
		$m = " минут ";	
	}	
	return $hour . $h . $min . $m;
}
print "<b>Текущее время:</b> ";
echo curTime(); 
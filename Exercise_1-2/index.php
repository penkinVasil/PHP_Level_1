<?php

$arg1 = 0;
$arg2 = 0;
$result = 0;

if(!empty($_GET)) {
	$arg1 = (int)$_GET['arg1'];
	$arg2 = (int)$_GET['arg2'];
	$operator = $_GET['operator'];
	$result = mathOperation($arg1,$arg2,$operator);
}

function sum($arg1,$arg2) {
	return $arg1 + $arg2;
}
function diff($arg1,$arg2) {
	return $arg1 - $arg2;
}
function mult($arg1,$arg2) {
	return $arg1 * $arg2;
}
function quot($arg1,$arg2) {
	return ($arg2!=0) ? $arg1 / $arg2 : "Forbidden";
} 

function mathOperation($arg1,$arg2,$operation) {
	switch($operation) {
		case "+":
			return sum($arg1,$arg2);
		case "-":
			return diff($arg1,$arg2);
		case "*":
			return mult($arg1,$arg2);
		case "/":
			return quot($arg1,$arg2); 
	}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calc</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<form class = "calcForm" method="get">
    <input type="text" name="arg1" value=<?=$arg1?>>
	<select name="operator">
		<option <?php if($_GET['operator'] == '+') echo "selected"?>>+</option>
		<option <?php if($_GET['operator'] == '-') echo "selected"?>>-</option>
		<option <?php if($_GET['operator'] == '*') echo "selected"?>>*</option>
		<option <?php if($_GET['operator'] == '/') echo "selected"?>>/</option>
	</select>
	<input type="text" name="arg2" value=<?=$arg2?>>
	<input type="submit" value="=">
	<input readonly type="text" name="result" value=<?=$result?>>
</form>

<!--Задание 2-->

<form class = "calcForm" method="get">
    <input type="text" name="arg1" value=<?=$arg1?>>
	<input type="submit" value="+" name="operator">
	<input type="submit" value="-" name="operator">
	<input type="submit" value="*" name="operator">
	<input type="submit" value="/" name="operator">
	<input type="text" name="arg2" value=<?=$arg2?>>
	<input type="submit" value="=">
	<input readonly type="text" name="result" value=<?=$result?>>
</form>
<br>
</body>
</html>
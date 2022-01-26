<?php

// Задание_1

while($a<=100) {
	$a++;
	if($a%3==0) {
		echo $a . " ";
	}
}

print "<hr>";



// Задание_2

$b = 0;

do { 
	if($b==0) {
		echo "{$b} - ноль<br>";
	}
	$b++;
	echo($b & 1) ? "{$b} - нечётное число<br>" : "{$b} - чётное число<br>";
}	while($b<10); 


print "<hr>";


// Задание_3

$locations = [
	"Московская область" => ["Москва","Зеленоград","Клин"], 
	"Ленинградская область" => ["Санкт-Петербург","Всеволожск","Павловск","Кронштадт"],
	"Рязанская область" => ["Рязань","Касимов","Сасово","Скопин"],
	"Челябинская область" => ["Челябинск","Магнитогорск","Касли","Южноуральск"]
];

foreach($locations as $region => $cities) {
	echo $region . ":<br>" . implode(", ", $cities) . ".<br>";
} 	 


print "<hr>";


// Задание_4

$alfabet = [
	'а' => 'a',   'б' => 'b',   'в' => 'v',
	'г' => 'g',   'д' => 'd',   'е' => 'e',
	'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
	'и' => 'i',   'й' => 'y',   'к' => 'k',
	'л' => 'l',   'м' => 'm',   'н' => 'n',
	'о' => 'o',   'п' => 'p',   'р' => 'r',
	'с' => 's',   'т' => 't',   'у' => 'u',
	'ф' => 'f',   'х' => 'h',   'ц' => 'c',
	'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
	'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
	'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];



function translite($str, $alfabet){
	
	for($i=0; $i<mb_strlen($str); $i++) {
		$letter = mb_substr($str, $i, 1);
		if($alfabet[$letter]){
			$newStr .= $alfabet[$letter];				
		} else {
			$smLetter = mb_strtolower($letter); 
			$newStr .= $alfabet[$smLetter];
			$bigLetter = mb_strtoupper($alfabet[$smLetter]);
			$newStr = str_replace($alfabet[$smLetter], $bigLetter, $newStr);
			if($letter == $smLetter) $newStr .= $letter; 
		} 
	}
	return $newStr;
} 

echo translite("Привет, мир! Прощай оружие!", $alfabet);  


print "<hr>";


// Задание_5

function underscore($str) {
	$str = str_replace(" ", "_", $str);
	return $str;
}

echo underscore("Привет, мир! Прощай оружие!");


print "<hr>";




// Задание_6

// находится в директории Exercise_6





// Задание_7

for ($i=0; $i<10; print $i++) {
	// пусоте тело цикла
}


print "<hr>";



// Задание_8

foreach($locations as $region => $cities) {
	foreach($cities as $city => $name) {
		$str = mb_substr($name, 0, 1);
		if($str === "К") {
			echo $name . "<br>";
		}
	}
} 

print "<hr>";


// Задание_9


function transliteUnderscore($str, $alfabet){
	
	for($i=0; $i<mb_strlen($str); $i++) {
		$letter = mb_substr($str, $i, 1);
		if($alfabet[$letter]){
			$newStr .= $alfabet[$letter];				
		} else {
			$smLetter = mb_strtolower($letter); 
			$newStr .= $alfabet[$smLetter];
			$bigLetter = mb_strtoupper($alfabet[$smLetter]);
			$newStr = str_replace($alfabet[$smLetter], $bigLetter, $newStr);
			if($letter == $smLetter) $newStr .= $letter; 
		} 
	}
	$strUnderscore = str_replace(" ", "_", $newStr);
	return $strUnderscore;
} 

echo transliteUnderscore("Привет, мир! Прощай оружие!", $alfabet);



<?php
$year = date('Y');
$content = renderTemplate("content", $year);
$about = renderTemplate("about");




// Задание_5 (меню из массива)

$menuArr = ['"#1"' => 'Главная', '"#2"' => 'Статьи', '"#3"' => 'Поиск', '"#4"' => 'Контакты'];
$subMenuArr = ['"#5"' => 'Карта', '"#6"' => 'Комментарии', '"#7"' => 'Программы', '"#8"' => 'Отзывы'];

foreach($menuArr as $href => $menuItem) {
	for($i=0;$i<1;$i++) {
		$menuRef .=  "<li><a href = {$href}>{$menuItem}</a></li>";		
	}
}
foreach($subMenuArr as $href => $menuItem) {
	for($i=0;$i<1;$i++) {
		$subMenuRef .=  "<li><a href = {$href}>{$menuItem}</a></li>";		
	}
}

$menu = renderTemplate("menu", $menuRef, $subMenuRef);



function renderTemplate($page, $content = " ", $menu = " ", $about = " ") {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

echo renderTemplate("main", $content, $menu, $about); 


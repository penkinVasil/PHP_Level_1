<?php
$content = renderTemplate("content");
$menu = renderTemplate("menu");
$about = renderTemplate("about");

function renderTemplate($page, $content = "", $menu = " ", $about = " ") {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

echo renderTemplate("main", $content, $menu, $about); 


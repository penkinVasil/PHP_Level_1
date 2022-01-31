<?php

define('IMGPATH', "gallery_img/small/");
define('IMGPATH2', "gallery_img/big/");

function getImage() {
	$imgDir = scandir(IMGPATH);
	$imgDir = array_splice($imgDir, 2);
	foreach($imgDir as $filename) {
		$images .= "<a href=" . IMGPATH2 . "{$filename} target=_blank><img class=img src=" . IMGPATH . "{$filename} alt={$filename}></a>";
	}
	return $images;
}

$content = renderTemplate("content", getImage());

$messages = [
        'ok' => 'Файл загружен',
        'error' => 'Ошибка загрузки',
        'size' => 'недопустимый размер файла',
];

if (!empty($_FILES)) {
    $path = "upload/" . $_FILES['myfile']['name'];
	
    if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path)) {
        $message =  "ok";
    } else {
        $message =   "error";
    }
    header("Location: index.php?message=" . $message);
    die();
}
$message = $messages[$_GET['message']];

function renderTemplate($page, $content = " ") {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

echo renderTemplate("main", $content);

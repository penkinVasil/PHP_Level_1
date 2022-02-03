<?php

include 'classSimpleImage.php';


require "db.php";

$result = mysqli_query($db, "SELECT * FROM `images`");
$result = mysqli_query($db, "SELECT * FROM `images` ORDER BY `views` DESC");

$content = renderTemplate("content", $result);


$messages = [
        'ok' => 'Файл загружен',
        'error' => 'Ошибка загрузки',
        'size' => 'недопустимый размер файла',
];

if (!empty($_FILES)) {
	
    $path_big = "gallery_img/big/" . $_FILES['image']['name']; 
	$path_small = "gallery_img/small/" . $_FILES['image']['name']; 
	
	// чёрный список типов файлов
	
	$blacklist = array(".php", ".phtml", ".php3", ".php4");
	foreach ($blacklist as $item) {
		if(preg_match("/$item\$/i", $_FILES['image']['name'])) {
		echo "We do not allow uploading PHP files\n";
		exit;
		}
	}
	
	// проверка типа файла
	
	$imageinfo = getimagesize($_FILES['image']['tmp_name']);
	if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png') {
		echo "Sorry, we only accept GIF, JPEG or PNG images\n";
		exit;
	}
	
	// проверка размера файла
	
	if($_FILES['image']['size'] > 1024 * 5 * 1024) {
		echo "Размер файла больше 5 Mб";
		exit;
	} 
	
	// добавление в базу данных 
	
    if (move_uploaded_file($_FILES['image']['tmp_name'], $path_big)) {
		$image = new SimpleImage();
		$image->load($path_big);
		$image->resize(150,100);
		$image->save($path_small);
        $message =  "ok";
		$curImgName = $_FILES['image']['name'];
		mysqli_query($db, "INSERT INTO `images`(`filename`) VALUES ('{$curImgName}')");
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


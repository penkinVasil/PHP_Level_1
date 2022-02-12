<?php

session_start();
require "db.php";
$session = session_id();


if ($_GET['action'] == 'buy') {
	$id = (int)$_GET['id'];
	mysqli_query($db, "INSERT INTO `basket`(`session_id`, `goods_id`) VALUES ('{$session}','{$id}')");
	header("Location: /");
	die();
} else if ($_GET['action'] == 'delete') {
	$id = (int)$_GET['id'];
	mysqli_query($db, "DELETE FROM `basket` WHERE id_b = {$id}");
	header("Location: basket.php");
	die();
}

$result = mysqli_query($db, "SELECT * FROM `goods`, `images` WHERE goods.id = images.id");


$count = $_COOKIE['counter'] ?? 0;
$count++;
setcookie("counter", $count, time()+36000, "/");
$userViews  = "Просмотров этой страницы: " . $count;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "auth.php";?>
<a href="basket.php"><button class="basketButton">Корзина</button></a>
<h2>clothing store</h2>
<div id = "gallery">
<?foreach($result as $value):?> 
	<a href="view.php?id=<?=$value['id']?>">
		<img class=img src="gallery_img/small/<?=$value['filename']?>" width="150" height="150" alt="<?=$value['filename']?>"> 		
		<p class="productName"><?=$value['product']?></p>
		<button class="buyButton">Buy now</button>
		<p class="price"><?=$value['price']?>$</p>
	</a>	
<?endforeach;?> 
</div>
<p class="userViews"><?=$userViews?></p>
<br>
</body>
</html>
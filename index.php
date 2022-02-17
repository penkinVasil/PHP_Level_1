<?php

session_start();

require "db.php";
include "auth.php";
$session = session_id();


if ($_GET['action'] == 'buy') {
	$id = (int)$_GET['id'];
	$result = mysqli_query($db, "SELECT price FROM goods WHERE id = {$id}");
	$row = mysqli_fetch_assoc($result); 
	$price  = $row['price'];
	mysqli_query($db, "INSERT INTO `basket` (`session_id`, `goods_id`, `price`) VALUES ('{$session}','{$id}', '{$price}')");
	header("Location: /");
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
<h2>clothing store</h2>
<div id = "catalog">
<?php foreach($result as $value):?> 
	<div class="goodCard">
		<a href="view.php?id=<?=$value['id']?>">
			<img class="img" src="gallery_img/small/<?=$value['filename']?>" width="150" height="150" alt="<?=$value['filename']?>"> 		
			<p class="productName"><?=$value['product']?></p>
		</a>	
		<a href="/?action=buy&id=<?=$value['id']?>"><button class="buyButton">Buy now</button></a>
		<p class="price"><?=$value['price']?>$</p>
	</div>
<?php endforeach;?> 
</div>
<p class="userViews"><?=$userViews?></p>
<br>
</body>
</html>
<?php 

require "db.php";

$id = (int)$_GET['id'];

$result = mysqli_query($db, "SELECT * FROM `images` WHERE id = {$id}");
$row = mysqli_fetch_assoc($result);
$result = mysqli_query($db, "UPDATE `images` SET `views`= `views` + 1 WHERE id = {$id}"); 

$info = mysqli_query($db, "SELECT * FROM `goods` WHERE id = {$id}");
$part  = mysqli_fetch_assoc($info);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>clothing store</h2>
<div id = "wrapper">
	<img class="imgBig" src="gallery_img/big/<?=$row['filename']?>" width="250" height="250" alt="<?=$row['filename']?>">
	<h1 class="goodName"><?=$part['product']?></h1>
	<p class="goodInfo"><?=$part['description']?></p>
	<button class="buy">Buy now</button>
	<p class="price"><?=$part['price']?>$</p>
	<p class="views">Число просмотров: <?=$row['views']?></p>
</div>
<br>
</body>
</html>
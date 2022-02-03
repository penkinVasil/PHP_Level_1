<?php 

require "db.php";

$id = (int)$_GET['id'];

$result = mysqli_query($db, "SELECT * FROM `images` WHERE id = {$id}");

$row = mysqli_fetch_assoc($result);

if ($_GET['action'] == 'oneview') {
	$result = mysqli_query($db, "UPDATE `images` SET `views`= `views` + 1 WHERE id = {$id}"); 
} 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div id = "wrapper">
	<img class="imgBig" src="gallery_img/big/<?=$row['filename']?>" width="800" height="500" alt="<?=$row['filename']?>">
	<p class="views">Число просмотров: <?=$row['views']?></p>
</div>
<br>
</body>
</html>
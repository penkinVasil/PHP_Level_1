<?php

require "db.php";

$result = mysqli_query($db, "SELECT * FROM `images`");
$info = mysqli_query($db, "SELECT * FROM `goods`");
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
<div id = "gallery">
<?foreach($result as $file):?> 
	<a href="view.php?id=<?=$file['id']?>">
		<img class=img src="gallery_img/small/<?=$file['filename']?>" width="150" height="150" alt="<?=$file['filename']?>"> 		
		<?$good = mysqli_fetch_assoc($info)?> 
		<p class="productName"><?=$good['product']?></p>
		<button class="buyButton">Buy now</button>
		<p class="price"><?=$good['price']?>$</p>
	</a>	
<?endforeach;?> 	
</div>
<br>
</body>
</html>
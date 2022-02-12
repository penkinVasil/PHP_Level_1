<?php

require "db.php";


$basket = mysqli_query($db, "SELECT * FROM basket, goods, images WHERE basket.goods_id = goods.id AND basket.goods_id = images.id");

$result = mysqli_query($db, "SELECT SUM(goods.price) as sum FROM basket, goods WHERE basket.goods_id=goods.id");
$sum = mysqli_fetch_assoc($result)['sum'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "auth.php";?>
<h2>корзина</h2>
<div id = "wrapper">
<?php foreach ($basket as $value): ?>
		<img src="gallery_img/small/<?=$value['filename']?>" width="50" height="50" alt="<?=$value['filename']?>"><br>
        <?=$value['product']?><br>
        price: <?=$value['price']?><br>
        <a href="/?action=delete&id=<?=$value['id_b']?>">Удалить</a><br>
		<hr>
<?php endforeach;?>
ИТОГО: <?=$sum?>
</div>
<br>
</body>
</html>
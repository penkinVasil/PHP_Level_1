<?php

session_start();
require "db.php";
include "auth.php";


$basket = mysqli_query($db, "SELECT * FROM basket, goods, images WHERE basket.goods_id = goods.id AND basket.goods_id = images.id");

$result = mysqli_query($db, "SELECT SUM(goods.price) as sum FROM basket, goods WHERE basket.goods_id=goods.id");
$sum = mysqli_fetch_assoc($result)['sum'];

if ($_GET['action'] == 'delete') {
	$id = (int)$_GET['id'];
	mysqli_query($db, "DELETE FROM `basket` WHERE id_b = {$id}");
	header("Location: basket.php");
	die();
}

$orderForm = ($count == "0") ? 'none;' : 'block;';  // если корзина пуста, поле "Оформить заказ" недоступно

if(isset($_POST['order'])) {
	$customer = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST['customer'])));
	$phone = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST['phone'])));
	$session = session_id();
	foreach($basket as $orderData) {
		$result = mysqli_query($db, "INSERT INTO `orders`(`customer`, `phone`, `session_id`, `product`, `price`) VALUES ('{$customer}', '{$phone}', '{$session}', '{$orderData['product']}', '{$orderData['price']}')"); 
	}
	$result = mysqli_query($db, "DELETE FROM `basket` WHERE session_id = '{$session}'");
	header("Location: /");
	die(); 
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>корзина</h2>
<div id = "wrapper">
<?php foreach ($basket as $value): ?>
		<img src="gallery_img/small/<?=$value['filename']?>" width="50" height="50" alt="<?=$value['filename']?>"><br>
        <?=$value['product']?><br>
        price: <?=$value['price']?><br>
        <a href="?action=delete&id=<?=$value['id_b']?>">Удалить</a><br>
		<hr>
<?php endforeach;?>
ИТОГО: <?=$sum ?? 0 . "<br>Корзина пуста";?>
<br>
<form class = "order" style = 'display:<?=$orderForm?>' method="post">
	<label>Ваше имя</label>
    <input type="text" name="customer" placeholder="Василий">
	<label>Ваш телефон</label>
	<input type="text" name="phone" placeholder="8(9**)-***-****">
    <input type="submit" class="toOrder" name="order"value="Оформить заказ">
</form>
</div>
<br>
</body>
</html>
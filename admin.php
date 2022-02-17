<?php

session_start();

require "db.php";
include "auth.php";

$session = session_id();

if(!is_admin()) die('Доступ запрещён!');


$result = mysqli_query($db, "SELECT * FROM `orders` WHERE session_id = '{$session}'");


// Получение суммы и вывод блока информации при наличии заказа

$getSum = mysqli_query($db, "SELECT SUM(price) as sum FROM orders WHERE session_id = '{$session}'");
$sum = mysqli_fetch_assoc($getSum)['sum'];
if($sum == null) {
	$orderInfo = 'none;';
	$orderMessage = 'block;';
} else {
	$orderInfo = 'block;';
	$orderMessage = 'none;';
}


// Удаление заказа

if ($_GET['action'] == 'delete') {
	mysqli_query($db, "DELETE FROM `orders` WHERE session_id = '{$session}'");
	header("Location: " . $_SERVER['HTTP_REFERER']);
	die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Admin Room</h2>
<div id = "wrapper">
	<?php foreach($result as $item): ?> 
		<p><?="Product: " . "<b>{$item['product']}</b>;" . " Price: " . "<b>{$item['price']}</b>;"?></p>
	<?php endforeach;?>
	<div class="orderInfo" style = 'display:<?=$orderInfo?>'>
		ИТОГО: <b><?=$sum?></b>
		<p><?="Customer: " . "<b>{$item['customer']}</b>;" . " Phone: " . "<b>{$item['phone']}</b>;"?></p>
		<a href="?action=delete">Удалить заказ</a><br>
		<hr>
	</div>
	<p class="message" style = 'display:<?=$orderMessage?>'>Заказов нет! &#129300;</p>
</div>
<br>
</body>
</html>
<?php

require "db.php";

if(isset($_POST['reg'])) {
	$userLogin = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$userPass = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	$hash = password_hash($userPass, PASSWORD_DEFAULT);
	$result = mysqli_query($db, "INSERT INTO `users`(`login`, `pass`, `passHash`) VALUES ('{$userLogin}', '{$userPass}', '{$hash}')");
	die("Вы успешно зарегистрированы!<br><a href='index.php'>На главную</a>"); 
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>clothing store</h2>
<div id = "wrapper">
	<form class = "refForm" method="post">
		<label>Введите ваш логин</label><br>
		<input class="area" type="text" name="login"><br>
		<label>Введите ваш пароль</label><br>
		<input class="area" type="password" name="pass"><br>
		<input class="authButton" type="submit" name="reg" value="Зарегистрироваться">
	</form>
</div>
<br>
</body>
</html>
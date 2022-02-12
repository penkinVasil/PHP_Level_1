<?php 

session_start();
require "db.php";
$allow = false;


if(isAuth()) {
	$allow = true;
	$login = getUser();
}

function isAuth() {
	return isset($_SESSION['login']);
	
}
 
function getUser() {
	return $_SESSION['login'];
}	
 
 
if(isset($_GET['logout'])) {
	session_destroy();
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
} 

if(isset($_POST['ok'])) {
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	if(auth($login, $pass, $db)) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die(); 
	} else {
		die("<h4>Не верный логин или пароль!</h4>");
	}
}

function auth($login, $pass, $db) {
	$login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
	if(password_verify($pass, $row['passHash'])) {
		$_SESSION['login'] = $login;
		$_SESSION['id'] = $row['id'];
		return true;
	}
	return false;
}


if(isset($_POST['toReg'])) {
	header('Location: reg.php');
}
	
?>
<?php if($allow):?>
	<p class="greet">Добро пожаловать, <?=$login?>!</p>
	<a class="exit" href="?logout">[Выйти]</a>
	<a class="toMain" href="index.php">[На главную]</a>
<?php else:?>
	<form class ="auth" method="post">
		<label>Введите ваш логин</label><br>
		<input class="area" type="text" name="login"><br>
		<label>Введите ваш пароль</label><br>
		<input class="area" type="password" name="pass"><br>
		<input class="chkbox" type="checkbox" name="save"><span class="saveMe">Запомнить меня</span><br>
		<input class="authButton" type="submit" name="ok" value="Войти">
		<input class="regButton" type="submit" name="toReg" value="Регистрация">
	</form>
<?php endif;?>
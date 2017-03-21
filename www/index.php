<?php
	//session_start();
	if(isset($_POST["enter"])){
		$login=$_POST["login"];
		$pass=MD5($_POST["pass"]);
		if ($login=="") {
			$error="Введите логин!";
		}
		$mysqli = new mysqli("localhost","root","","db");
		$mysqli->query("SET NAMES 'utf8'");
		$reg = $mysqli->query("SELECT * FROM `users`");
			while(($row=$reg->fetch_assoc())!=false){
				if ($login==$row['login']&&$pass==$row['pass']){
					header("Location: welcom.php?send=1");
				}
				if ($login==$row['login']&&$pass!=$row['pass']){
					$error="Неверно введен пароль!";
				}
			}
		$mysqli->close();
		}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form name="AUTHORIZATION" method="post" action="">
	<div id="reg">
		<p align="CENTER">Авторизация</p><hr>
		<div class="left">
		<input type="text" name="login" id="login" placeholder="Введите логин..."><br>
		<input type="text" name="pass" id="pass" placeholder="Введите пароль..."><br>
		</div>
		<div class="left">
			<a href="add.php">Регистрация</a>
		</div>
		<div class="right">
			<input id="submit" type="submit" name="enter" value="Войти">
		</div>
	</div>

	</form>
	<p align="center" style="color: red"><?=$error?></p>
</body>
</html>
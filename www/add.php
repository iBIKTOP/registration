<?php
	if (isset($_POST['save'])){
		$login=$_POST["login"];
		$pass=MD5($_POST["pass"]);
		$repass=MD5($_POST["repass"]);
		if ($login=="") $login_error="Введите логин!";
		if ($pass=="d41d8cd98f00b204e9800998ecf8427e") $pass_error="Введите пароль!";
		if ($repass=="d41d8cd98f00b204e9800998ecf8427e") $repass_error="Повторите пароль!";
		if ($pass!=$repass) $repass_error="Пароли не совпадают!";
		$mysqli = new mysqli("localhost","root","","db");
		$mysqli->query("SET NAMES 'utf8'");
		$mysqli->query ("INSERT INTO `db`.`users` (`id`, `login`, `pass`, `date`) 
							VALUES (NULL, '$login', '$pass', UNIX_TIMESTAMP())");
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
		<p align="CENTER">Регистрация</p><hr>
		<div class="left">
		<input type="text" name="login" id="login" placeholder="Введите логин..."><br>
		<input type="text" name="pass" id="pass" placeholder="Введите пароль..."><br>
		<input type="text" name="repass" id="pass" placeholder="Повторите пароль..."><br>
		</div>
		<div class="left">
				<input id="submit" type="submit" name="save" value="Сохранить">
		</div>
	</div>
	</form><br>
	<p align="center" style="color: red"><?=$login_error,$pass_error,$repass_error?></p>
</body>
</html>
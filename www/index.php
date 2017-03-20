<?php
		function print_set($reg,$pass){

			while(($row=$reg->fetch_assoc())!=false){
				if($row!=NULL) echo "test";
				if ($pass==$row['pass']) header("Location: test.php?send=1");
				if ($pass!=$row['pass']) {
					$error="Неверный пароль!";
					return $error;
				}
				}
		}
	//session_start();
	if(isset($_POST["enter"])){
		$login=$_POST["login"];
		$pass=MD5($_POST["pass"]);
		global $error;
		$error="";
	
		$mysqli = new mysqli("localhost","root","","db");
		$mysqli->query("SET NAMES 'utf8'");
		$reg = $mysqli->query("SELECT * FROM `users` WHERE `login` LIKE '$login'");
		if ($login=="") $error="Введите логин!";
		print_set($reg,$pass);
		
		/*$mysqli->query ("INSERT INTO `db`.`users` (`id`, `login`, `pass`, `date`) VALUES (NULL, '$login', MD5('$pass'), UNIX_TIMESTAMP())");*/
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
			<a href="">Регистрация</a>
		</div>
		<div class="right">
			<input id="submit" type="submit" name="enter" value="Войти">
		</div>
	</div>

	</form>
	<p align="center"><?=$error?></p>
</body>
</html>
<?php
session_start();

require_once 'vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/face.css">
	<title>Document</title>
</head>
<body>
	<div id="header">
		<div class="container">
    		<h1 class="neonText">
          		<a href="/register.php">Регистрация</a> /
          		<a href="/authorization.php">Авторизация</a>
    		</h1>
 		</div>
	</div>
 	<br>
 	<p>Здесь должна быть информация о новостях, но ёё нет</p>
 	<p>REALME:</p>
 	<p>Чтобы получить доступ к редактированию товаров, то надо иметь права администратора, без прав можно только заправшивать информацию из базы данных и тд.</p>
 	<p>Реализована функция авторизации и регистрации для разграничения прав между пользователями</p>
 	<p>В проекте лежит база данный в папке db, её нужно добавить в msql для полного функционирования сайта
 	</p>
 	<p>логин пользователя: 123, пароль:123</p>
 	<p>логин администратора: 1234, пароль:1234</p>
</body>
</html>
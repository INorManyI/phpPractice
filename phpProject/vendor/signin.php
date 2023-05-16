<?php
	session_start();
 	require_once 'connect.php';



 	$login = $_POST['login'];
 	$password = md5($_POST['password']);
 	$check_information = mysqli_query($connect, "SELECT * FROM `information` WHERE `login` = '$login' AND `password` = '$password'");
 	if(mysqli_num_rows($check_information) > 0) {

 		$information = mysqli_fetch_assoc($check_information);

 		$_SESSION['information'] = [
 			"id" => $information['identification'],
 			"accesslevel" => $information['accesslevel']
 		];
 		$_SESSION['message'] = 'Успешная Авторизация';
 		header('Location: /product.php');
 	} else{
 		$_SESSION['message'] = 'Неверный логин или пароль.';
 				header('Location: /authorization.php');
 	}



?>
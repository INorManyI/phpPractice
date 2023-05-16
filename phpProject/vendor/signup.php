<?php
		session_start();
 		require_once 'connect.php';

 		$surname = $_POST['surname'];
 		$name = $_POST['name'];
 		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
 		$login = $_POST['login'];
 		$password = $_POST['password'];
 		$accesslevel = "user";
 		$identification = time();

 		if($surname == "" || $name == "" || $lastname == "" || $email == "" || $phone == "" || $login == "" || $password == "") {
	      	$_SESSION['message'] = 'Заполните все поля.';
	 			header('Location: /register.php');
    	}else{
 			$password = md5($password);

 			mysqli_query($connect, "INSERT INTO `User` (`identification`, `surname`, `name`, `lastname`, `phone`, `mail`) VALUES ('$identification', '$surname', '$name', '$lastname', '$phone', '$email')");
 			mysqli_query($connect,"INSERT INTO `information` (`identification`, `login`, `password`, `accesslevel`) VALUES ('$identification', '$login', '$password', '$accesslevel')");
 			$_SESSION['message'] = 'Регистрация прошла успешно!';
 				header('Location: /authorization.php');

    	}


?>
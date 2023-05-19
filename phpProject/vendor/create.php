<?php
	session_start();

	require_once '../vendor/connect.php';

	if($_SESSION['information'] and $_SESSION['information']['accesslevel'] != "admin") {
		header('Location: /product.php');
	} else {
		$id = time();
		$mark = $_POST['mark'];
		$model = $_POST['model'];
		$title = $_POST['title'];
		$number = $_POST['number'];
		$price = $_POST['price'];
		mysqli_query($connect, "INSERT INTO `product` (`id`, `mark`, `model`, `title`, `number`, `price`) VALUES ('$id', '$mark', '$model', '$title', '$number', '$price')");
	}

?>
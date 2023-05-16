<?php
	session_start();

	require_once '../vendor/connect.php';

	if($_SESSION['information'] and $_SESSION['information']['accesslevel'] != "admin") {
		header('Location: /products.php');
	} else {
		$id = $_POST['id'];
		$mark = $_POST['mark'];
		$model = $_POST['model'];
		$title = $_POST['title'];
		$number = $_POST['number'];
		$price = $_POST['price'];
		mysqli_query($connect, "UPDATE `product` SET `mark` = '$mark', `model` = '$model', `title` = '$title', `number` = '$number', `price` = '$price' WHERE `product`.`id` = '$id'");
		header('Location: /product.php');
	}
?>
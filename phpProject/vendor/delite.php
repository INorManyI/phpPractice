<?php
	session_start();

	require_once '../vendor/connect.php';

	if($_SESSION['information'] and $_SESSION['information']['accesslevel'] != "admin") {
		header('Location: /product.php');
	} else {

		$product_id = $_GET['id'];

		mysqli_query($connect, "DELETE FROM product WHERE `product`.`id` = '$product_id'");
		header('Location: /product.php');
	}
?>
<?php

	session_start();

	require_once 'vendor/connect.php';

	if($_SESSION['user'] and $_SESSION['user']['part'] != "admin") {
		header('Location: /product.php');
	} else {
		$product_id = $_GET['id'];
		$product = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$product_id'");
		$product = mysqli_fetch_assoc($product);
		var_dump($product);
	}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update product</title>
</head>
<body>
	<h3>Изменение продукта</h3>
	<form action="vendor/update.php" method="post">

		<p>Марка машины</p>
			<input type="text" name="mark" value="<?= $product['mark'] ?>">
			<p>Модель машины</p>
			<input type="text" name="model" value="<?= $product['model'] ?>">
			<p>Название детали</p>
			<input type="text" name="title" value="<?= $product['title'] ?>">
			<p>количество для добавления</p> <!--Придумать для сложения деталей-->
			<input type="number" name="number" value="<?= $product['number'] ?>">
			<p>Цена товара</p>
			<input type="number" name="price" value="<?= $product['price'] ?>">
			<br><br>
			<button type="submit">Изменить</button>

	</form>
</body>
</html>
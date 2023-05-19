<?php
	session_start();

	require_once 'vendor/connect.php';

	if(!$_SESSION['information']) {
		header('Location: /face.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Авторизация и регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>
<div id="header">
	<div class="container">
    	<h1 class="neonText">
          <a href="vendor/logout.php" id="pouring">Выход</a>
    	</h1>
 	</div>

 	<div class="container1">
 		<?php if($_SESSION['information']['accesslevel'] === "admin") {?>
    		<h1 class="neonText">
          		Администратор
    		</h1>
    	<?php } else { ?>
    		<h1 class="neonText">
          		Пользователь
    		</h1>

    	<?php } ?>
 	</div>

</div>

<div id="main">
	<div id="select">
		<form method="get" action="">
			<table>
				<tr>
					<th>Поиск:</th>
					<th>Сортировка:</th>

				</tr>
				<tr>
					<td><input type="text" name="carPrice" value="<?php echo $_GET['carPrice']; ?>"></td>
					<td>
						<select name="column" >
				    		<option <?php if ($_GET['column'] == '0'){echo "selected='selected'";} ?>>--</option>
				    		<option <?php if ($_GET['column'] == 'ID'){echo "selected='selected'";} ?>>ID</option>
				    		<option <?php if ($_GET['column'] == 'mark'){echo "selected='selected'";} ?>>mark</option>
				    		<option <?php if ($_GET['column'] == 'model'){echo "selected='selected'";} ?>>model</option>
				    		<option <?php if ($_GET['column'] == 'title'){echo "selected='selected'";} ?>>title</option>
				    		<option <?php if ($_GET['column'] == 'number'){echo "selected='selected'";} ?>>number</option>
				    		<option <?php if ($_GET['column'] == 'price'){echo "selected='selected'";} ?>>price</option>
				    	</select>
				    	<select name="operation">
						    <option <?php if ($_GET['operation'] == ''){echo "selected='selected'";} ?>>ASC</option>
						    <option <?php if ($_GET['operation'] == 'DESC') {echo "selected='selected'";} ?>>DESC</option>
						</select>
					</td>
					<td><input type="submit" value="Send" /></td>
				</tr>
			</table>
	</div>
	</form>
	<div id="table">
		<table>
		<tr>
			<th>ID</th>
			<th>Марка</th>
			<th>Модель</th>
			<th>Название</th>
			<th>Количество</th>
			<th>Цена</th>
		</tr>

		<?php
			$column = $_GET['column'];
			$operation  = $_GET['operation'];
			$carPrice = $_GET['carPrice'];
			if(!empty($carPrice)){
				if($column != "--"){
					if($operation == "DESC"){
						$products = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$carPrice' || `number` = '$carPrice' || `price` = '$carPrice' ||`mark` = '$carPrice' || `model` = '$carPrice' || `title` = '$carPrice' ORDER BY $column DESC");
					}
					else{
						$products = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$carPrice' || `number` = '$carPrice' || `price` = '$carPrice' ||`mark` = '$carPrice' || `model` = '$carPrice' || `title` = '$carPrice' ORDER BY $column");
					}
				}
				else{
					$products = mysqli_query($connect, "SELECT * FROM `product` WHERE `id` = '$carPrice' || `number` = '$carPrice' || `price` = '$carPrice' ||`mark` = '$carPrice' || `model` = '$carPrice' || `title` = '$carPrice' ");
				}
			}
			else{
				if($column != "--"){
					if($operation == "DESC"){
						$products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY $column DESC");
					}
					else{
						$products = mysqli_query($connect, "SELECT * FROM `product` ORDER BY $column");
					}
				}
				else{
					$products = mysqli_query($connect, "SELECT * FROM `product` ");
				}
			}
			if($products == NULL){
				$products = mysqli_query($connect, "SELECT * FROM `product` ");
			}
			$products = mysqli_fetch_all($products);
			file_put_contents('data.txt', '');
			foreach ($products as $product) {
				file_put_contents('data.txt', implode(" | ", $product), FILE_APPEND);
				file_put_contents('data.txt', "\n", FILE_APPEND); ?>
						<tr>
							<td><?= $product[0] ?></td>
							<td><?= $product[1] ?></td>
							<td><?= $product[2] ?></td>
							<td><?= $product[3] ?></td>
							<td><?= $product[4] ?></td>
							<td><?= $product[5] ?></td>

	 					<?php if($_SESSION['information']['accesslevel']  === "admin") { ?>
							<td><a href='update.php?id=<?= $product[0] ?>'>Update</a></td>
							<td><a href='vendor/delite.php?id=<?= $product[0] ?>'>Delite</a></td>
						<?php  } ?>
						</tr>
			<?php  } ?>

		</table>
		<a href="data.txt" download="">
		<button>Скачать файл</button>
		</a>

	</div>

	<div id="AddProduct">
		<?php if($_SESSION['information']['accesslevel'] === "admin") { ?>
		<button id="click-to-hide" type="submit">Добавление продукта</button>
		<div id="hidden-element">
			<form action="vendor/create.php" method="post">

				<p>Марка машины:</p>
				<input type="text" name="mark">
				<p>Модель машины:</p>
				<input type="text" name="model">
				<p>Название детали:</p>
				<input type="text" name="title">
				<p>Количество для добавления:</p> <!--Придумать для сложения деталей-->
				<input type="number" name="number">
				<p>Цена товара:</p>
				<input type="number" name="price">
				<br><br>
				<button type="submit">Отправить</button>
			</form>
		<?php  } ?>
		</div>
	<script>
	  	document.addEventListener("DOMContentLoaded", hiddenCloseclick());
	  	document.getElementById('click-to-hide').addEventListener("click", hiddenCloseclick);
		function hiddenCloseclick() {
		let x = document.getElementById('hidden-element');
	      if (x.style.display == "none"){
		  x.style.display = "block";
		  } else {
		 x.style.display = "none"}
	    };
  	</script>
	</div>
	<div id="AddNews">
		<?php if($_SESSION['information']['accesslevel'] === "admin") { ?>
		<button id="click" type="submit">Добавление Новости</button>
		<div id="element">
			<form action="vendor/createNews.php" method="post" enctype="multipart/form-data">
					<p>Картинка:</p>
					<input type="file" name="file">
					<p>Тема:</p>
					<input type="text" name="subject">
					<p>Описание:</p>
					<input type="text" name="description">
					<br><br>
					<button type="submit">Отправить</button>
			</form>
			<?php  } ?>
		</div>
	</div>
	<script>
	  	document.addEventListener("DOMContentLoaded", hiddenCloseclick());
	  	document.getElementById('click').addEventListener("click", hiddenCloseclick);
		function hiddenCloseclick() {
		let x = document.getElementById('element');
	      if (x.style.display == "none"){
		  x.style.display = "block";
		  } else {
		 x.style.display = "none"}
	    };
  	</script>


</div>

</body>
</html>
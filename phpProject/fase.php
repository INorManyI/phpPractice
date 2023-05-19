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
	<?php
	$news = mysqli_query($connect, "SELECT * FROM `News` ");
	$news = mysqli_fetch_all($news); ?>
	<div id="main">
		<?php foreach($news as $newsPrint){ ?>
			<div id="text">
				<img src="img/<?=$newsPrint[1]?>" width="200px" height="200px" style=' object-fit: contain'>
				<p><?= $newsPrint[2] ?></p>
				<p><?= $newsPrint[3] ?></p>
			</div>
		<?php } ?>
 	</div>
	</div>

</body>
</html>
<?php
	session_start();
	if($_SESSION['information']) {
		header('Location: /fase.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="css/authorizationRegister.css">
</head>
<body>
 <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
 	<label>Фамилия</label>
 	<input type="text" name="surname" placeholder="Введите свою Фамилию">
 	<label>Имя</label>
 	<input type="text" name="name" placeholder="Введите своё полное Имя">
 	<label>Отчество</label>
 	<input type="text" name="lastname" placeholder="Введите своё Отчество">
 	<label>Почта</label>
 	<input type="email" name="email" placeholder="Введите свою почту">
 	<label>Телефон</label>
 	<input type="text" name="phone" placeholder="Введите свой телефон">
 	<label>Логин</label>
 	<input type="text" name="login" placeholder="Придумайте логин">
 	<label>Пароль</label>
 	<input type="password" name="password" placeholder="Придумайте пароль">

 	<button type="submit">Зарегестрироваться</button>
 	<p>
 		У вас уже есть аккаунт? - <a href="/index.php">Авторизируйтесь</a>!
 	</p>
 	<?php
 		if($_SESSION['message']) {
 			echo'<p class="msg"> '. $_SESSION['message'] .'</p>';
 		}
 		unset($_SESSION['message']);
 		?>
 </form>


</body>
</html>
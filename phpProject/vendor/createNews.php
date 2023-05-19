<?php
	session_start();

	require_once '../vendor/connect.php';


	$up_exp = array('png', 'jpg', 'gif');

	if($_SESSION['information'] and $_SESSION['information']['accesslevel'] != "admin") {
		header('Location: /product.php');
	} else {
		$file = $_FILES['file'];
		$subject = $_POST['subject'];
		$description = $_POST['description'];

		if(!empty($_FILES['file'])) {
			$type = strtolower(end(explode('.', $file['name'])));
		    if(!in_array($type, $up_exp)) {
		    	echo 'Вы пытаетесь загрузить недоступный формат!';
		    	header('location: /product.php');
		    }
	    else {
				$pathFile = 'C:/OSPanel/domains/phpProject/img/'.$file['name'];

				if(!move_uploaded_file($file['tmp_name'], $pathFile)) {
					echo 'Файл не смог загрузиться';
				}else{
					$add = $file['name'];
					$result = mysqli_query($connect, "INSERT INTO `News` (`id`, `image`, `subject`, `description`) VALUES (NULL, '$add', '$subject', '$description')");
					echo($result);
				}
	    header('location: /product.php');

	}
}
	}

?>
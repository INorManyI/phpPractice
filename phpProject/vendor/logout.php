<?php
	session_start();
	unset($_SESSION['information']);
	header('Location: /fase.php');
?>
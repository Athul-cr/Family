<?php
	session_start();
	session_destroy();
	unset($_SESSION['nme']);
	$_SESSION['success'] = "you are logged out";
	header("location: Login.php");
	?>
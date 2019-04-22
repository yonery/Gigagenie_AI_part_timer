<?php
	session_start();
	unset($_SESSION["status"]);
	$_SESSION["status"] = 0;
	header("location:main.html");
?>
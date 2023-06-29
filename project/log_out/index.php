<?php

	session_start();

	$_SESSION["logged"] = false;

	unset($_SESSION["adm"]);

	header("Location: main.php");

?> 
<?php

	session_start();

	$_SESSION["logged"] = false;

	unset($_SESSION["user"]);

	header("Location: main.php?page=" . $login->pageCode);

?> 
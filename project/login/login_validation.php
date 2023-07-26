<?php

	session_start();

	require "../../connection.php";

	require "../sources.php";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		
		//Inputs

		$email = $_POST["email"];
		$password = $_POST["password"];

		//Controls

		$_SESSION["login_validation"] = [

			"email" => false,
			"password" => false

		];

		$sql = "SELECT password, adm FROM users WHERE email = '$email'";

		$result = mysqli_query($conn, $sql);

		//Validation

		//Email

		if (mysqli_num_rows($result) == 1) {

			//Correct e-mail

			$_SESSION["login_validation"]["email"] = true;

			$user = mysqli_fetch_assoc($result);
			
			if (password_verify($password, $user["password"])) {
				
				//Correct password

				$_SESSION["login_validation"]["password"] = true;

			}else{

				//Incorrect password

				$_SESSION["login_validation"]["password"] = false;

			}

		}else{

			//Incorrect e-mail

			$_SESSION["login_validation"]["email"] = false;

		}

		//If both e-mail and password are right

		if ($_SESSION["login_validation"]["email"] && $_SESSION["login_validation"]["password"]) {
			
			unset($_SESSION["login_validation"]); //Unsetting the validation variable

			$_SESSION["logged"] = true; //User is logged

			//Updating login date

			$login_sql = "UPDATE users SET logged_at = CURRENT_TIMESTAMP WHERE email = '$email'";

			$login_result = mysqli_query($conn, $login_sql);

			//Getting user's data

			$user_sql = "SELECT * FROM users WHERE email = '$email'";

			$user_result = mysqli_query($conn, $user_sql);

			$_SESSION["user"] = mysqli_fetch_assoc($user_result);

			unset($_SESSION["login_email"]);
			unset($_SESSION["login_password"]);

			if (isset($_GET["redirect"])) {
				header("Location: ../main.php?page=" . $_GET["redirect"]);
			}else{
				header("Location: ../main.php?page={$home->pageCode}");
			}

		}else{

			$_SESSION["login_email"] = $email;
			$_SESSION["login_password"] = $password;

			if (isset($_GET["redirect"])) {
				
				header("Location: ../main.php?page=" . $login->pageCode . "&redirect=" . $_GET["redirect"]);
			
			}else{

				header("Location: ../main.php?page=" . $login->pageCode);

			}

		}

	}else{

		echo "formulário não enviado";

	}


?>
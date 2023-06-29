<?php

	session_start();

	require "../../connection.php";

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

		if (mysqli_num_rows($result) == 1) {

			//Correct e-mail

			$_SESSION["login_validation"]["email"] = true;

			$user = mysqli_fetch_assoc($result);
			
			if (password_verify($password, $user["password"])) {
				
				//Correct password

				unset($_SESSION["login_validation"]); //Unsetting the validation variable

				$_SESSION["logged"] = true; //User is logged

				//Updating login date

				$login_sql = "UPDATE users SET logged_at = CURRENT_TIMESTAMP WHERE email = '$email'";

				$login_result = mysqli_query($conn, $login_sql);

				//Getting user's data

				$user_sql = "SELECT * FROM users WHERE email = '$email'";

				$user_result = mysqli_query($conn, $user_sql);

				$_SESSION["user"] = mysqli_fetch_assoc($user_result);

				header("Location: ../main.php?page=141520519");

			}else{

				//Incorrect password

				$_SESSION["email-input"] = $email;
				$_SESSION["password-input"] = $password;
				$_SESSION["login_validation"]["password"] = false;

				header("Location: ../main.php?page=12157914");

			}

		}else{

			//Incorrect e-mail

			$_SESSION["email-input"] = $email;
			$_SESSION["password-input"] = $password;
			$_SESSION["login_validation"]["email"] = false;
			$_SESSION["login_validation"]["password"] = true;

			header("Location: ../main.php?page=12157914");

		}

	}else{

		echo "formulário não enviado";

	}


?>
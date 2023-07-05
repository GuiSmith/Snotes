<?php

	session_start();

	require "../../connection.php";

	$passcode = $_GET["passcode"];

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		
		//Inputs
		
		$password = $_POST["password"];
		$password_confirmation = $_POST["password-confirmation"];

		//Password Validation

		if (preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=[\]{};:"\\|,.<>\/?]{8,}$/', $password)) {

			if ($password === $password_confirmation) {

				unset($_SESSION["password-input"]);
				unset($_SESSION["password-confirmation-input"]);
				
				$_SESSION["password_validation"] = true;

				$hashed_password = password_hash($password, PASSWORD_DEFAULT); //Hashing password

				//Updating password

				$update_sql = "UPDATE users SET password = '$hashed_password' WHERE passcode = '$passcode'";

				$update_result = mysqli_query($conn, $update_sql);

				//Unsetting passcode

				$unset_sql = "UPDATE users SET passcode = NULL WHERE passcode = '$passcode'";

				$unset_result = mysqli_query($conn, $unset_sql);

				unset($_SESSION["password-input"]);
				unset($_SESSION["password-confirmation-input"]);

				header("Location: ../main.php?page=" . $login->pageCode);

			}else{

				$_SESSION["password_validation"] = false;

			}

		}else{

			$_SESSION["password_validation"] = "fraca";

		}

		if ($_SESSION["password_validation"] === false || $_SESSION["password_validation"] === "fraca") {

			$_SESSION["password-input"] = $password;
			$_SESSION["password-confirmation-input"] = $password_confirmation;

			echo $_SESSION["password-input"] . "<br>";
			echo $_SESSION["password-confirmation-input"] . "<br>";
			echo $_SESSION["password_validation"];



			header("Location: ../main.php?passcode=" . $passcode);

		}

	}

?>
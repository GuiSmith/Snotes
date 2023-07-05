<?php

	session_start();

	require "../../connection.php";

	require "../../mailing.php";

	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$email = $_POST["email"];

		$sql = "SELECT email FROM users WHERE email = '$email'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			
			$_SESSION["password_sent"] = true;

			unset($_SESSION["email-input"]);

			$passcode = random_int(100000,999999);

			$passcode_sql = "UPDATE users SET passcode = '$passcode' WHERE email = '$email'";

			$passcode_result = mysqli_query($conn, $passcode_sql);

			sendEmail($email, $passcode);

		}else{

			$_SESSION["email-input"] = $email;

			$_SESSION["password_sent"] = false;

		}

		header("Location: ../main.php?page=" . $password->pageCode);
		
		echo "Formulário enviado";

	}

?>
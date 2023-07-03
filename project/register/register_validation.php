<?php

	//Session

	session_start();

	//Database

	require "../../connection.php";

	require "../sources.php";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {

		//Inputs

		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		//Controls

		$_SESSION["register_validation"] = [

			"name" => false,
			"email" => false,
			"password" => false

		];

		//Validation

		//Name

		$_SESSION["register_validation"]["name"] = validate($name, "name");

		//E-mail

		$email_sql = "SELECT email FROM users WHERE email = '$email'";

		$email_result = mysqli_query($conn,$email_sql);

		if (mysqli_num_rows($email_result) == 1) {

			$_SESSION["register_validation"]["email"] = false;

		}else{

			$_SESSION["register_validation"]["email"] = true;

		}

		//Password

		$_SESSION["register_validation"]["password"] = validate($password, "password");

		//Inserting values

		if ($_SESSION["register_validation"]["name"] && $_SESSION["register_validation"]["email"] && $_SESSION["register_validation"]["password"]) {
			
			//Hashing password

			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			//Feeding the database

			$insert_sql = "INSERT INTO users (name, email, password) values ('$name', '$email', '$hashed_password')";

			$insert_result = mysqli_query($conn,$insert_sql);

			//Unsetting session variables

			unset($_SESSION["name-input"]);
			unset($_SESSION["email-input"]);
			unset($_SESSION["password-input"]);

			header("Location: ../main.php?page=12157914");

		}else{

			$_SESSION["name-input"] = $name;
			$_SESSION["email-input"] = $email;
			$_SESSION["password-input"] = $password;

			header("Location: ../main.php?page=185791920518");

		}

	}else{

		if (validate("Guilherme", "name")) {
			
			echo "Sim";

		}else{

			echo "Não";

		}

	}

?>
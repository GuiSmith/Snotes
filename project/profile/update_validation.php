<?php

	//Session

	session_start();

	//Database

	require "../../connection.php";

	require "../sources.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		//Inputs

		$name = $_POST["name"];
		$nickname = $_POST["nickname"];

		//Controls

		$_SESSION["update_validation"] = [

			"name" => false,
			"nickname" => false,

		];

		//Validation

		//Name

		if (preg_match('/^[a-zA-Z]+$/', $name)) {

      $_SESSION["update_validation"]["name"] = true;

    }else{

      $_SESSION["update_validation"]["name"] = false;

    }

		//Nickname

		if ($nickname == $_SESSION["user"]["nickname"]) {

			$_SESSION["update_validation"]["nickname"] = true;
			
		}else{

			$_SESSION["update_validation"]["nickname"] = false;

			$nick_sql = "SELECT nickname FROM users WHERE nickname = '$nickname'";

			$nick_result = mysqli_query($conn, $nick_sql);

			if (mysqli_num_rows($nick_result) > 0) {
				
				$_SESSION["update_validation"]["nickname"] = false;

			}else{

				$_SESSION["update_validation"]["nickname"] = true;

			}

		}

		//Inserting values

		if ($_SESSION["update_validation"]["nickname"] && $_SESSION["update_validation"]["name"]) {
			
			//Updating the database

			$id = $_SESSION["user"]["id"];

			$update_sql = "UPDATE users SET name = '$name', nickname = '$nickname' WHERE ID = '$id'";

			$update_result = mysqli_query($conn, $update_sql);

			if ($update_result) {
				
				echo "Data updated";

				$_SESSION["user"]["name"] = $name;
				$_SESSION["user"]["nickname"] = $nickname;

			}else{

				echo "Error: " . mysqli_error($conn);

			}

			unset($_SESSION["update_name"]);
			unset($_SESSION["update_nickname"]);

		}else{

			$_SESSION["update_name"] = $name;
			$_SESSION["update_nickname"] = $nickname;

		}

		header("Location: ../main.php?page=" . $profile->pageCode);

	}

?>
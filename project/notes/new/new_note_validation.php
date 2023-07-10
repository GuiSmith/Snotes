<?php

	session_start();

	require "../../../connection.php";

	require "../../sources.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$note_title = $_POST["note_title"];
		$note_text = $_POST["note_text"];
		$user_id = $_SESSION["user"]["id"];

		$encryption_key = random_bytes(16);

		$encryption_IV = random_bytes(16);

		$encrypted_text = openssl_encrypt($note_text, 'AES-256-CBC', $encryption_key, 0, $encryption_IV);

		$store_encryption_key = bin2hex($encryption_key);

		$store_encryption_IV = bin2hex($encryption_IV);

		$sql = "INSERT INTO notes (title, text, user_id, encryption_key, encryption_IV) VALUES ('$note_title', '$encrypted_text', '$user_id', '$store_encryption_key', '$store_encryption_IV')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			
			header("Location: ../../main.php?page=" . $notes->pageCode);

		}else{

			echo "Error: " . mysqli_error($conn);

		}

	}

	// if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
	// 	$note_title = $_POST["note_title"];
	// 	$note_text = $_POST["note_text"];
	// 	$user_id = $_SESSION["user"]["id"];

	// 	$sql = "INSERT INTO notes (title, text, user_id) VALUES ('$note_title', '$note_text', '$user_id')";

	// 	$result = mysqli_query($conn, $sql);

	// 	if ($result) {
			
	// 		header("Location: ../main.php?page=" . $notes->pageCode);

	// 	}else{

	// 		echo "Error: " . mysqli_error($conn);

	// 	}

	// }

?>
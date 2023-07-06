<?php

	session_start();

	require "../../connection.php";

	require "../sources.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$note_title = $_POST["note_title"];
		$note_text = $_POST["note_text"];
		$user_id = $_SESSION["user"]["id"];

		$sql = "INSERT INTO notes (title, text, user_id) VALUES ('$note_title', '$note_text', '$user_id')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			
			header("Location: ../main.php?page=" . $notes->pageCode);

		}else{

			echo "Error: " . mysqli_error($conn);

		}

	}

?>
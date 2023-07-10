<?php

	session_start();

	require "../../../connection.php";

	require "../../sources.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$note_id = $_POST["note_id"];
		$note_title = $_POST["note_title"];
		$note_text = $_POST["note_text"];
		$note_visibility = $_POST["visibility"];

		$note_sql = "SELECT encryption_key, encryption_IV FROM notes WHERE id = '$note_id'";
		$note_result = mysqli_query($conn, $note_sql);
		$note = mysqli_fetch_assoc($note_result);

		$encryption_key = hex2bin($note["encryption_key"]);
		$encryption_IV = hex2bin($note["encryption_IV"]);

		$encryptedText = openssl_encrypt($note_text, 'AES-256-CBC', $encryption_key, 0 ,$encryption_IV);

		$update_sql = "UPDATE notes SET title = '$note_title', text = '$encryptedText', visibility = '$note_visibility' WHERE id = '$note_id'";

		$update_result = mysqli_query($conn, $update_sql);

		if ($update_result) {
			
			header("Location: ../../main.php?page=" . $see_note->pageCode . "&note={$note_id}");

			// echo $note_id;

		}else{

			echo "Error: " . mysqli_error($conn);

		}

	}

?>
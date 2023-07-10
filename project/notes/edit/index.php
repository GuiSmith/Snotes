<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$note_id = $_POST["note_id"];

		$note_sql = "SELECT title, text, encryption_key, encryption_IV FROM notes WHERE id = '$note_id'";
		$note_result = mysqli_query($conn, $note_sql);

		if (mysqli_num_rows($note_result) == 1) {
			
			$note = mysqli_fetch_assoc($note_result);

			$encryption_key = hex2bin($note["encryption_key"]);
			$encryption_IV = hex2bin($note["encryption_IV"]);

			$decrypted_text = openssl_decrypt($note["text"], 'AES-256-CBC', $encryption_key, 0, $encryption_IV);

		}

		if (isset($_POST["operation"]) && $_POST["operation"] == "delete") {
			
			$delete_sql = "UPDATE notes SET active = false WHERE id = '$note_id'";

			$delete_result = mysqli_query($conn, $delete_sql);

			if ($delete_result) {
				
				header("Location: main.php?page=" . $notes->pageCode);

			}else{

				mysqli_error($conn);

			}

		}

	}

?>

<?php

	createHeader(

		$note["title"],
		"Editando Anotação"
	);

?>

<form action = "<?php echo $edit_note->fileName ?>/edit_note_validation.php" method = "POST"  class = "box-content box-form box-editor box-center" autocomplete = "off" onsubmit = "return confirmSubmit()" >

	<div class = "form-group" >
		
		<input type = "hidden" name = "note_id" value = "<?php echo $note_id ?>">

	</div>

	<!-- Título -->
	
	<div class = "form-group" >
		
		<label for = "note_title" class = "form-label" >
			
			Título da anotação

		</label>

		<input type = "text" name = "note_title" id = "note_title" class = "form-control" placeholder = "Digite aqui..." title = "Digite o título de sua anotação" value = "<?php echo $note["title"] ?>" required autofocus >

	</div>

	<!-- Texto -->

	<div class = "form-group" >
		
		<textarea id = "summernote" name = "note_text" required><?php echo $decrypted_text ?></textarea>

	</div>

	<!-- Enviar -->

	<div class = "form-group text-right" >
		
		<button type = "submit" name = "submit" class = "btn btn-info">Enviar</button>

	</div>

</form>
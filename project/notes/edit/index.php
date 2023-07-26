<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$note_id = $_POST["note_id"];

		$note_sql = "SELECT title, text, visibility, encryption_key, encryption_IV FROM notes WHERE id = '$note_id'";
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

	}else{
		createHeader("Caminho indevido", "Edite uma anotação ao visualiza-la!");
		die();
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

		<input type = "text" name = "note_title" id = "note_title" class = "form-control" placeholder = "Digite aqui..." title = "Digite o título de sua anotação" value = "<?php echo $note["title"] ?>" maxlength = "25" required autofocus >

	</div>

	<!-- Texto -->

	<div class = "form-group" >
		
		<textarea id = "summernote" name = "note_text" required><?php echo $decrypted_text ?></textarea>

	</div>

	<!-- Parâmetros & Enviar -->

	<div class = "row form-group" >
		
		<!-- Parâmetros -->

		<div class = "col-sm-8" >
			
			<span class = "box-visibility" >
				
				<input type = "radio" name = "visibility" id = "personal" value = "personal">

				<label for = "personal" >Pessoal</label>

			</span>

			<span class = "box-visibility" >
				
				<input type = "radio" name = "visibility" id = "private" value = "private" >

				<label for = "private" >Privado</label>

			</span>

			<bold id = "tooltip" title = "Ao marcar como pessoal, esta anotação só pode ser visualizada pelo autor. Se marcado como privado, esta anotação pode ser visualizada por qualquer usuário" >?</bold>

		</div>

		<!-- Enviar -->

		<div class = "col-sm-4 text-right" >
			
			<button type = "submit" name = "submit" class = "btn btn-info">Enviar</button>

		</div>

	</div>

</form>

<script>

	const personal_radio = document.getElementById("personal");
	const private_radio = document.getElementById("private");

	const visibility = "<?php echo $note["visibility"] ?>";

	switch(visibility){

		case "personal":

			personal_radio.checked = true;
			break;

		case "private":

			private_radio.checked = true;
			break;

		default:

			console.log("Error, visibility = " + visibility);

	}

</script>
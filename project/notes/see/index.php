<?php

	if (isset($_GET["note"])) {
		$note_id = $_GET["note"];
		$note_sql = "SELECT * FROM notes WHERE id = '$note_id'";
		$note_result = mysqli_query($conn, $note_sql);
		
		if (mysqli_num_rows($note_result) == 1) {
			$note = mysqli_fetch_assoc($note_result);
			if ($note["user_id"] != $_SESSION["user"]["id"]) {
				if ($note["visibility"] != "private") {
					createHeader("Anotação pessoal", "Esta anotação é pessoal");
					die();
				}else{
					$form_display = "none";
				}
			}else{
				$form_display = "block";
			}

			$encryption_key = hex2bin($note["encryption_key"]);
			$encryption_IV = hex2bin($note["encryption_IV"]);

			$note_decrypted_text = openssl_decrypt($note["text"], 'AES-256-CBC', $encryption_key, 0, $encryption_IV);

			if ($note["active"]) {

				if ($form_display == "none") { //None means it's not YOUR note, block or any other thing means it's your note
					$user_id = $note["user_id"];
					$user_sql = "SELECT name FROM users WHERE id = '$user_id'";
					$user_result = mysqli_query($conn, $user_sql);
					if (mysqli_num_rows($user_result) >= 1) {
						$user = mysqli_fetch_assoc($user_result);
						$header_subtitle = "Anotação de {$user["name"]}";
					}else{
						$header_subtitle = "Anotação de Excluído";
					}
				}else{
					$header_subtitle = "Minha anotação";
				}
				echo "<article id = 'note-container' >";
				createHeader($note["title"],$header_subtitle);
				echo "<div id = 'note-text' class = 'box-center box-content box-editor' >";
				echo "<img id = 'export-button' src = 'media/pdf2.png' width = '30' >";
				echo $note_decrypted_text;
				$page_title = $note["title"];
				echo "</div>";
				echo "</article>";
			}else{
				createHeader("Anotação Excluída","Esta anotação foi excluída pelo autor");
				$form_display = "none";
			}
		}
	}else{
		header("Location: main.php?page=" . $notes->pageCode);
	}
?>

<form style = "display: <?php echo $form_display ?>" method = "POST" action = "main.php?page=<?php echo $edit_note->pageCode ?>" class = "box-center box-content box-editor" onsubmit = "return confirmSubmit()" >
	<input type = "hidden" name = "note_id" value = "<?php echo $note_id ?>">
	<div class = "row" >
		<div class = "col-sm-4 text-left" >
			<button type = "submit" name = "operation" value = "delete" class = "btn btn-danger">Excluir</button>
		</div>
		<div class = "col-sm-4 text-center" >
			<h3 class = "see-visibility" >
				<?php
					switch ($note["visibility"]) {
						case "personal":
							echo "Pessoal";
							break;
						case "private":
							echo "Privado";
							break;
						default:
							echo "visibility error";
							break;
					}
				?>
			</h3>
		</div>
		<div class = "col-sm-4 text-right" >
			<button type = "submit" name = "submit" class = "btn btn-info" >Editar</button>
		</div>
	</div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src = "<?php echo $see_note->fileName ?>/index.js" ></script>
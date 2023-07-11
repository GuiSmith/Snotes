<?php

	if (isset($_GET["note"])) {

		$note_id = $_GET["note"];

		$note_sql = "SELECT * FROM notes WHERE id = '$note_id'";

		$note_result = mysqli_query($conn, $note_sql);

		if (mysqli_num_rows($note_result) == 1) {
			
			$note = mysqli_fetch_assoc($note_result);

			$encryption_key = hex2bin($note["encryption_key"]);
			$encryption_IV = hex2bin($note["encryption_IV"]);

			$note_decrypted_text = openssl_decrypt($note["text"], 'AES-256-CBC', $encryption_key, 0, $encryption_IV);

			if ($note["active"]) {

				createHeader($note["title"],"Anotação");
				
				echo "<div class = 'box-center box-content box-editor' >";

				echo $note_decrypted_text;

				$page_title = $note["title"];

				echo "</div>";

			}else{

				createHeader(

					"Anotação Excluída",
					"Esta anotação foi excluída pelo autor"

				);

			}

		}

	}else{

		header("Location: main.php?page=" . $notes->pageCode);

	}

?>

<form method = "POST" action = "main.php?page=<?php echo $edit_note->pageCode ?>" class = "box-center box-content box-editor" onsubmit = "return confirmSubmit()" >
		
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

<script>
	
	function confirmSubmit(){

		var operation = document.querySelector("button[name='operation']:focus").value;

		return confirm("Tem certeza de que deseja excluir esta anotação? Essa ação é irreversível!");

	}

</script>
<?php

	createHeader(

		"Criando anotação",
		"Anote uma lista, ideia ou pequeno texto!"

	);

?>

<form action = "<?php echo $new_note->fileName ?>/new_note_validation.php" method = "POST"  class = "box-content box-form box-editor box-center" autocomplete = "off" >
	
	<div class = "form-group" >
		
		<label for = "note_title" class = "form-label" >
			
			Título da anotação

		</label>

		<input type = "text" name = "note_title" id = "note_title" class = "form-control" placeholder = "Digite aqui..." title = "Digite o título de sua anotação" required autofocus >

	</div>

	<div class = "form-group" >
		
		<textarea id = "summernote" name = "note_text" required></textarea>

	</div>

	<div class = "form-group text-right" >
		
		<button type = "submit" class = "btn btn-info">Enviar</button>

	</div>

</form>
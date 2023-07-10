<?php

	createHeader(

		"Criando anotação",
		"Anote uma lista, ideia ou pequeno texto!"

	);

?>

<!-- Formulário de criação -->

<form action = "<?php echo $new_note->fileName ?>/new_note_validation.php" method = "POST"  class = "box-content box-form box-editor box-center" autocomplete = "off" >

	<!-- Título -->
	
	<div class = "form-group" >
		
		<label for = "note_title" class = "form-label" >
			
			Título da anotação

		</label>

		<input type = "text" name = "note_title" id = "note_title" class = "form-control" placeholder = "Digite aqui..." title = "Digite o título de sua anotação" required autofocus >

	</div>

	<!-- Texto -->

	<div class = "form-group" >
		
		<textarea id = "summernote" name = "note_text" required></textarea>

	</div>

	<!-- Parâmetros & Enviar -->

	<div class = "row form-group" >

		<!-- Parâmetros -->
		
		<div class = "col-sm-8" >
			
			<span class = "box-visibility" >
				
				<input type = "radio" name = "visibility" id = "personal" value = "personal" checked>

				<label for = "personal" >Pessoal</label>

			</span>

			<span class = "box-visibility" >
				
				<input type = "radio" name = "visibility" id = "private" value = "private" >

				<label for = "private" >Privado</label>

			</span>

			<a href = "">O que são parâmetros de privacidade?</a>

		</div>

		<!-- Enviar -->

		<div class = "col-sm-4 text-right" >
			
			<button type = "submit" class = "btn btn-info">Enviar</button>

		</div>

	</div>

</form>
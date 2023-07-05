<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-page text-center " >

	<div class = "text-center" >

		<?php createLinkButton("Novo", "?page=" . $new_note->pageCode); ?>
		<?php createLinkButton("Grupo", "?page=home"); ?>
		<?php createLinkButton("Excluir", "?page=home"); ?>

	</div>
	
	<form class = "search-bar" >

		<select class = "search-dropdown" >
		  <option value="option1" selected>Título</option>
		  <option value="option2">Sinopse</option>
		  <option value="option3">Texto</option>
		  <option value="option4">Grupo</option>
		</select>
		
		<input class = "search-input" type = "text" name = "search" placeholder = "Pesquise aqui..." title = "Pesquise uma anotação">

	</form>

</div>

<section class = "m-4" style = "word-spacing: 10px;" >

	<div class = "box-grid box-content" >
		
		<h3 class = "text-center" >Título do texto</h3>

		<p class = "text-indent text-justify" style = "text-indent: 20px; padding: 0 10px" >Curabitur pulvinar nunc at nulla ornare, et facilisis ipsum maximus. Vestibulum vel tortor et leo aliquam pellentesque eget aliquam risus</p>

		<div class = "row" >
			
			<div class = "col-sm-6 text-left" >

				<p>
					
					Público

				</p>
				
			</div>

			<div class = "col-sm-6 text-right " >
				
				<p>
					
					03/07 17:24
					
				</p>

			</div>

		</div>

	</div>


	<div class = "box-grid box-content" >
		
		<h3 class = "text-center" >Título do texto</h3>

		<p class = "text-indent text-justify" style = "text-indent: 20px; padding: 0 10px" >Curabitur pulvinar nunc at nulla ornare, et facilisis ipsum maximus. Vestibulum vel tortor et leo aliquam pellentesque eget aliquam risus</p>

		<div class = "row" >
			
			<div class = "col-sm-6 text-left" >

				<p>
					
					Público

				</p>
				
			</div>

			<div class = "col-sm-6 text-right " >
				
				<p>
					
					03/07 17:24
					
				</p>

			</div>

		</div>

	</div>

</section>
<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-center text-center search-bar" >

	<div class = "block-center" >
		
		<?php createLinkButton("Novo", "?page=" . $note->pageCode) ?>
		<?php createLinkButton("Excluir", "?page=" . $note->pageCode) ?>

	</div>

	<form class = "search-form block-center" >
			
		<select class = "search-dropdown search-bar-item" >
			
			<option selected>Título</option>
			<option>Texto</option>

		</select><input class = "search-bar-item" type = "text" name = "search" placeholder = "Pesquise aqui..." title = "Pesquisa uma anotação"><button type = "submit" class = "search-bar-item">

			<img src = "media/search.png" width="20" >

		</button>

	</form>

</div>

<table>
	
	<th>
		
		ID

	</th>

	<th>
		
		Título

	</th>

	<th>
		
		Autor

	</th>

	<th>
		
		Visível

	</th>

</table>

<?php

	$notes_sql = "SELECT * FROM notes";

	$notes_result = mysqli_query($conn, $notes_sql);

	echo "<table>";

	while ($row = mysqli_fetch_assoc($notes_result)){

		echo "<tr>";

		foreach ($row as $column => $value) {
			
			if ($column != "text") {
				
				echo "<td>";
				echo $value;
				echo "</td>";

			}

		}

		echo "</tr>";
	
	}

	echo "</table>";

?>
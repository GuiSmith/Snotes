<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-center text-center search-bar" >

	<div class = "block-center" >
		
		<?php createLinkButton("Novo", "?page=" . $new_note->pageCode) ?>

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

<!-- Notes -->

<?php

	$notes_sql = "SELECT * FROM notes WHERE active = true";

	$notes_result = mysqli_query($conn, $notes_sql);

?>

<table class = "box-content box-center" >
	
	<thead>
		
		<?php

			$table_header = [

				"ID",
				"Criação",
				"Título",
				"Autor",
				"Alteração",
				"Visibilidade"

			];

			createTHeader($table_header);

		?>

	</thead>

	<tbody>
		
		<?php

			while ($row = mysqli_fetch_assoc($notes_result)) {

				//Author name

				$current_user = $_SESSION["user"]["id"];

				$author_sql = "SELECT name FROM users WHERE id = '$current_user' ";

				$author_result = mysqli_query($conn, $author_sql);

				$row_author = mysqli_fetch_assoc($author_result);

				//Visibility

				$visibility;

				switch ($row["visibility"]) {
					
					case "personal":
						
						$visibility = "Pessoal";

						break;

					case "private":

						$visibility = "Privado";

						break;
					
					default:
						
						$visibility = "public or error";

						break;
				}
				
				$table_line = [

					$row["id"],
					date("d/m/Y H:i:s", strtotime($row["created_at"])),
					$row["title"],
					$row_author["name"],
					($row["updated_at"] != "") ? (date("d/m/Y H:i:s", strtotime($row["updated_at"]))) : (""),
					$visibility

				];

				echo "<tr onclick = 'seeNote(" . $row["id"] . ")' >";
				createTLine($table_line, array_search("Título", $table_header));
				echo "</tr>";

			}

		?>

	</tbody>

</table>

<script>
	
	function seeNote(id){

		window.location.href = "?page=<?php echo $see_note->pageCode ?>&note=" + id;

		console.log(id);

	}

</script>
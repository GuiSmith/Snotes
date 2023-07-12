<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-center text-center search-bar" >

	<div class = "block-center" >
		
		<?php createLinkButton("Novo", "?page=" . $new_note->pageCode) ?>

	</div>

	<form action = "" method = "POST" class = "search-form block-center text-left" id = "search-box" >
	
		<select name = "column" id = "search-options" class = "search-dropdown search-bar-item" onclick = "search_note()" >
			
			<?php

			//For associative array

				$table_header = [

					"id" => "ID",
					"created_at" => "Criação",
					"title" => "Título",
					"user_id" => "Autor",
					"updated_at" => "Alteração",
					"visibility" => "Visibilidade"

				];

				createOption($table_header);

			?>

		</select>
		
		<input id = "search-bar-input" class = "search-bar-item" type = "text" name = "search" placeholder = "Pesquise aqui..." title = "Pesquise uma anotação" >
		
		<button type = "submit" class = "search-bar-item" >

			>>

		</button>

	</form>

</div>

<!-- Notes -->

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$column = $_POST["column"];
		$search = $_POST["search"];

		switch($column){

			case "id":

				$statement = "{$id} = '{$search}'";

				break;

		}

	}

	$notes_sql = "SELECT * FROM notes WHERE active = true ";

	$notes_result = mysqli_query($conn, $notes_sql);

	echo array_search("title", $table_header);

?>

<table class = "box-content box-center" >
	
	<thead>
		
		<?php

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

				echo "<tr class = 'note-line' onclick = 'seeNote(" . $row["id"] . ")' >";
				createTLine($table_line);
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

	function search_note(){

		const selected_column_value = document.getElementById("search-options").value;
		console.log("Column value: " + selected_column_value);

		const search_input = document.getElementById("search-bar-input");
		console.log("Searched value: " + search_input);

		if (selected_column_value == "created_at" || selected_column_value == "updated_at"){

			search_input.type = "datetime-local";

		}else{

			search_input.type = "text";

		}

	}

</script>
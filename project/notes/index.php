<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-center text-center search-bar" >

	<div class = "block-center" >
		
		<?php createLinkButton("Novo", "?page=" . $new_note->pageCode) ?>

	</div>

	<div class = "search-form block-center" >
	
		<select id = "search-options" class = "search-dropdown search-bar-item" onclick = "search_note()" >
			
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

		</select><input onkeyup = "search_note()" id = "search-bar-input" class = "search-bar-item" type = "text" name = "search" placeholder = "Pesquise aqui..." title = "Pesquisa uma anotação">

	</div>

</div>

<!-- Notes -->

<?php

	$notes_sql = "SELECT * FROM notes WHERE active = true";

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

		const selected_column_index = document.getElementById("search-options").selectedIndex;
		console.log("Column index: " + selected_column_index);

		const search_string = document.getElementById("search-bar-input").value;
		console.log("Search String: " + search_string);


		const lines = document.getElementsByClassName("note-line");

		for(var i = 0; i < lines.length; i++){

			const columns = lines[i].getElementsByTagName("td");

			column = columns[selected_column_index].textContent;

			switch(selected_column_value){

				case "id":

					if (column == search_string) {

						lines[i].style.display = "table-row";

					}else{

						lines[i].style.display = "none";

					}

					break;

				default:

					console.log("option selected error");

					break;

			}

			if (search_string == "") {

				lines[i].style.display = "table-row";

			}
			
		}

	}

</script>
<?php createHeader(

	"Anotações",
	"Visualize suas anotações!"

	)

?>

<div class = "box-content box-center text-center search-bar" >

	<div class = "block-center" >
		
		<?php createLinkButton("Novo", "?page=" . $note->pageCode) ?>

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

<table class = "box-content box-center" style = "width: 30%;" >

	<!-- ID -->
	
	<th>
		
		ID

	</th>

	<!-- Title -->

	<th>
		
		Título

	</th>

	<!-- Author -->

	<th>
		
		Autor

	</th>

	<?php

		$note_id = "";

		$notes_sql = "SELECT * FROM notes";

		$notes_result = mysqli_query($conn, $notes_sql);

		while ($row = mysqli_fetch_assoc($notes_result)){

			foreach ($row as $column => $value) {

				//HTML & CSS

				if ($row["active"] && isset($_SESSION["user"]) && $row["user_id"] == $_SESSION["user"]["id"]) {
					
					if ($column != "text") {

						if ($column == "id") {
							
							echo "<tr onclick = 'seeNote(" . $value . ")' >";

						}
						
						if ($column == "title") {

							echo "<td class = 'text-left' >";

						}else{

							echo "<td class = 'text-center' >";

						}

						//Value

						switch ($column) {

							case "id":

								echo $value;

								$note_id = $value;

								break;
							
							case 'user_id':

								$user_sql = "SELECT name FROM users WHERE id = $value";

								$user_result = mysqli_query($conn, $user_sql);

								$user_row = mysqli_fetch_assoc($user_result);

								if (mysqli_num_rows($user_result) == 1) {
									
									echo $user_row["name"];

								}else{

									echo "user error";

								}
								
								break;

							case "active":



							break;
							
							default:
								
								echo $value;

								break;

						}

						echo "</td>";

					}

				}

			}

			echo "</tr>";
			echo "</a>";
		
		}

	?>

</table>

<script>
	
	function seeNote(id){

		window.location.href = "?note=" + id;

		console.log(id);

	}

</script>
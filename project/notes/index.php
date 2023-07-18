<?php createHeader("Anotações","Pesquisa e filtros") ?>
<div class = "box-content box-center text-center search-bar" >

	<!-- New Note -->
	<div>
		<h4>Nova anotação</h4>
		<p>
			<?php
				createLinkButton("Novo", "?page=" . $new_note->pageCode);
			?>
		</p>
	</div>

	<!-- Creation & Alteration -->
	<div class = "row" >
		<!-- Creation -->
		<div class = "col-sm-4" >
			<h4>Criação</h4>
			<form action = "" method = "POST" >
				<input type = "hidden" name = "filter_option" value = "created_at" >
				<input type = "hidden" name = "filter_operator" value = ">" >
				<?php
					$today = date('Y-m-d') . "T00:00";
					$week = date("Y-m-d", strtotime("-1 week")) . "T00:00";
					createFilterButton($today,"Hoje");
					createFilterButton($week, "Semana");
				?>
			</form>
		</div>
		<!-- Visibility -->
		<div class = "col-sm-4" >
			<h4>Visibilidade</h4>
			<form action = "" method = "POST" >
				<input type = "hidden" name = "filter_option" value = "visibility" >
				<?php
					createFilterButton("pessoal", "Pessoal");
					createFilterButton("privado", "Privado");
				?>
			</form>
		</div>
		<!-- Alteration -->
		<div class = "col-sm-4" >
			<h4>Alteração</h4>
			<form action = "" method = "POST" >
				<input type = "hidden" name = "filter_option" value = "updated_at" >
				<input type = "hidden" name = "filter_operator" value = ">" >
				<?php
					createFilterButton($today,"Hoje");
					createFilterButton($week, "Semana");
				?>
			</form>
		</div>
	</div>

	<!-- Visibility -->
	

	<form action = "" method = "POST" class = "search-form block-center" id = "search-form" >
		
		<!-- Option List -->
		<select id = "search-options" class = "search-item" name = "filter_option" onclick = "search_note()" >
			<?php
			//For associative array
				$table_header = [
					"id" => "ID",
					"created_at" => "Criação",
					"title" => "Título",
					"updated_at" => "Alteração",
					"visibility" => "Visibilidade"
				];
				if (!isset($_POST["filter_option"])) {
					$option = "id";
				}else{
					$option = $_POST["filter_option"];
				}
				echo "<option value = 'search' >Pesquisar</option>";
				createOption($table_header);
			?>
		</select>

		<!-- Operator List -->
		<?php
			$operator_list = [
				">" => "maior que",
				"<" => "menor que"
			];
			if (!isset($_POST["filter_operator"])) {
				$operator = ">";
				$disabled = "disabled";
			}else{
				$operator = $_POST["filter_operator"];
				$disabled = "";
			}
		?>
		<select id = "search-operator-list" class = "search-item" name = "filter_operator" <?php echo $disabled ?>>
			<?php
				createOption($operator_list, $operator);
			?>
		</select>

		<!-- Input -->
		<?php
			if (!isset($_POST["filter_text"])) {
				$value = "";
				$type = "text";
			}else{
				if ($option == "created_at" || $option == "updated_at") {
					$type = "datetime-local";
				}else{
					$type = "text";

				}
				$value = $_POST["filter_text"];
			}
		?>
		<input id = "search-bar-input" class = "search-item" name = "filter_text" type = "<?php echo $type ?>" placeholder = "Pesquise aqui..." title = "Pesquise uma anotação" value = "<?php echo $value ?>" >

		<!-- Button -->
			<button type = "submit" class = "search-item search-button">>></button>

	</form>

</div>

<h4 class = "text-center" >Visualização</h4>

<!-- Notes builder -->

<?php

	$current_user = $_SESSION["user"]["id"];

	$notes_sql = "SELECT * FROM notes WHERE active = true AND user_id = '$current_user'";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$option = $_POST["filter_option"];
		$value = $_POST["filter_text"];

		if ($value != "" && $option != "search") {

    	$notes_sql .= " AND {$option} ";

    	// echo "Valor: " . $value . "<Br>";
    	
    	switch ($option) {

    		//ID
        case "id":
          $notes_sql .= "= {$value}";
          break;

        //Title
        case "title":
        	$notes_sql .= "LIKE '%{$value}%'";
          break;

        //Visibility
        case "visibility":
        	switch (strtolower($value)) {

        		case "privado":
        			$visibility_query = "private";
        			break;

        		case "pessoal":
        			$visibility_query = "personal";
        			break;
        		
        		default:
        			$visibility_query = "public";
        			break;
        	}

        	$notes_sql .= "LIKE '%{$visibility_query}%'";
        	break;

        //Creation and Alteration
        case "created_at":
        case "updated_at":

        	$operator = $_POST["filter_operator"];

        	$sqlDatetime = datetimeSQL($value);

        	// echo "HTML Datetime: " . $value . "<br>";

        	// echo "SQL Datetime: " . $sqlDatetime . "<br>";

          $notes_sql .= "{$operator} '{$sqlDatetime}'";

          break;
        
        default:
          
          // $sql += "other: {$filter_option}";

          break;
      }

    }

    // echo $notes_sql;

	}

	$notes_result = mysqli_query($conn, $notes_sql);

	echo array_search("title", $table_header);

?>

<!-- Notes table -->

<table class = "box-content box-center" >
	
	<thead>
		
		<?php

			createTHeader($table_header);

		?>

	</thead>

	<tbody>
		
		<?php

			while ($row = mysqli_fetch_assoc($notes_result)) {

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
					($row["updated_at"] != "") ? (date("d/m/Y H:i:s", strtotime($row["updated_at"]))) : (""),
					$visibility

				];

				echo "<tr class = 'note-line' onclick = 'seeNote(" . $row["id"] . ")' >";
				createTLine($table_line, 3);
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

<script src = "notes/index.js" />
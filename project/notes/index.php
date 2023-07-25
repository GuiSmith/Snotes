<?php
	if (isset($_GET["user_id"])) {
		$user_id = $_GET["user_id"];
		$user_sql = "SELECT * FROM users WHERE id = $user_id";
		$user_result = mysqli_query($conn, $user_sql);
		if (mysqli_num_rows($user_result) >= 1) {
			$user = mysqli_fetch_assoc($user_result);
		}else{
			createHeader("Usuário não encontrado", "Este usuário foi deletado ou desativado");
			die();
		}
	}
	if (isset($user)) {
		$header_title = "Anotações de {$user["name"]}";
	}else{
		$header_title = "Minhas anotações";
	}
	createHeader($header_title,"Pesquisa e filtros");
?>
<div class = "box-content box-center text-center search-bar" >
	<!-- New Note -->
	<div style = "display: <?php if(isset($user)){echo "none";}else{echo "block";} ?>" >
		<h4>Nova anotação</h4>
		<p>
			<?php
				createLinkButton("Novo", "?page=" . $new_note->pageCode);
			?>
		</p>
	</div>
	<!-- Creation & Alteration -->
	<div class = "row" >
		<form id = "filter-form" action = "" method = "POST" >
			<input id = "option-input" type = "hidden" name = "filter_option" value = "id" >
			<input id = "text-input" type = "hidden" name = "filter_text" value = "id" >
			<input id = "clicked-button" type = "hidden" name = "clicked_button" value = "id" >
			<input type = "hidden" name = "filter_operator" value = ">" >
			<!-- Creation -->
			<div class = "col-sm-4" >
				<h4>Criação</h4>
				<?php
					$today = date('Y-m-d') . "T00:00";
					$week = date('Y-m-d', strtotime("-1 week")) . "T00:00";
					createFilterButton("created_at", $today, "Hoje");
					createFilterButton("created_at", $week, "Semana");
				?>
			</div>
			<div class = "col-sm-4" >
				<h4>Visibilidade</h4>
				<?php
					if (!isset($user)) {
						createFilterButton("visibility", "pessoal", "Pessoal");
					}
					createFilterButton("visibility", "privado", "Privado");
				?>
			</div>
			<div class = "col-sm-4" >
				<h4>Alteração</h4>
				<?php
					createFilterButton("updated_at", $today, "Hoje");
					createFilterButton("updated_at", $week, "Semana");
				?>
			</div>
		</form>
	</div>

	<!-- Filter Form -->
	<form action = "" method = "POST" class = "search-form block-center" id = "search-form" >
		<!-- Option List -->
		<select id = "search-options" class = "search-item" name = "filter_option" onclick = "search_note()" >
			<?php
				$table_header = [
					"id" => "ID",
					"created_at" => "Criação",
					"title" => "Título",
					"updated_at" => "Alteração",
					"visibility" => "Visibilidade"
				];
				if (!isset($_POST["filter_option"])) {
					$option = "title";
				}else{
					$option = $_POST["filter_option"];
				}
				createOption($table_header, $option);
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
<?php createHeader("Visualização","Clique e visualize") ?>
<!-- Notes builder -->
<?php
	if (isset($user)) {
		$author_id = $user["id"];
	}else{
		$author_id = $_SESSION["user"]["id"];
	}
	$notes_sql = "SELECT * FROM notes WHERE active = true AND user_id = '$author_id'";
	if (isset($user)) {
		$notes_sql .= " AND visibility = 'private'";
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$option = $_POST["filter_option"];
		$value = $_POST["filter_text"];
		if(isset($_POST["clicked_button"])){
			$button = $_POST["clicked_button"];
		}
		if ($value != "" && $option != "search") {
    	$notes_sql .= " AND {$option} ";
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
        			if (isset($user)) {
        				$visibility_query = "private";
        				break;
        			}
        			$visibility_query = "personal";
        			break;
        		default:
        			$visibility_query = "public";
        			break;
        	}
        	$notes_sql .= "= '{$visibility_query}'";
        	break;
        //Creation and Alteration
        case "created_at":
        case "updated_at":
        	$operator = $_POST["filter_operator"];
        	$sqlDatetime = datetimeSQL($value);
          $notes_sql .= "{$operator} '{$sqlDatetime}'";
          break;
        default:
          break;
      }
    }
	}
	$notes_sql .= " ORDER BY updated_at DESC";

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
				echo "<tr class = 'note-line' onclick = 'seeRegister({$see_note->pageCode}, \"note\",{$row["id"]})' >";
				$text_left = [3-1];
				createTLine($table_line, $text_left);
				echo "</tr>";
			}
		?>
	</tbody>
</table>
<script src = "notes/index.js" ></script>
<script>
	clickedButton("<?php if(isset($button)){echo $button;}else{echo "none";} ?>");
	alterColumn("<?php if(isset($column)){echo $column;}else{echo "none";} ?>","<?php if(isset($old_column)){echo $old_column;}else{echo "none";} ?>");
</script>
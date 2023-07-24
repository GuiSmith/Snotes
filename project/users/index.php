<?php

	createHeader("Usuários", "Pesquise usuários");

?>

<div class = "box-content box-center text-center box-form" >
	<h4>Filtro de pesquisa</h4>
	<form action = "" method = "POST" class = "search-form block-center" id = "search-form" onclick = "changePattern()" >
		<!-- Option List -->
		<select id = "search-options" class = "search-item" name = "filter_option" >
			<?php
				$table_header = [
					"id" => "ID",
					"name" => "Nome",
					"nickname" => "Apelido",
					"email" => "E-mail",
					"created_at" => "Cadastro",
					"notes" => "Anotações"
				];
				$not_option = [
					"created_at",
					"notes"
				];
				if (!isset($_POST["filter_option"])) {
					$option = "name";
				}else{
					$option = $_POST["filter_option"];
				}
				createOption($table_header, $option, $not_option);
			?>
		</select>
		<!-- Input -->
		<input id = "search-bar-input" class = "search-item" name = "filter_text" type = "text" pattern="[a-zA-Z]+" placeholder = "Pesquise aqui..." title = "Somente letras" value = "<?php if(isset($_POST["filter_text"])) echo $_POST["filter_text"] ?>" required >

		<!-- Button -->
			<button type = "submit" class = "search-item search-button btn-info">>></button>
	</form>
</div>

<script src = "users/index.js"></script>

<?php

	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
		$option = $_POST["filter_option"];
		$value = $_POST["filter_text"];
		$user_sql = "SELECT * FROM users WHERE $option ";
		switch ($option) {
			case "id":
				$user_sql .= "= {$value}";
				break;
			case "name":
			case "nickname":
			case "email":
				$user_sql .= "LIKE '%{$value}%'";
				break;
			default:
				
				break;
		}
		// echo $user_sql;
		$user_result = mysqli_query($conn, $user_sql);
		if (mysqli_num_rows($user_result) <= 0) {
			createHeader("Oops!", "Usuário não encontrado");
			die();
		}
	}
?>

<div style = "display: <?php if(isset($user_result)){echo "block";}else{echo "none";} ?>" >
	<table class = "box-content box-center" >
		<thead>
			<?php
				createTHeader($table_header);
			?>
		</thead>
		<tbody>
			<?php
					while ($user = mysqli_fetch_assoc($user_result)) {
					$notes_sql = "SELECT id FROM notes WHERE user_id = {$user["id"]}";
					$notes_result = mysqli_query($conn, $notes_sql);
					$table_line = [
						$user["id"],
						$user["name"],
						$user["nickname"],
						$user["email"],
						date("d/m/Y H:i", strtotime($user["created_at"])),
						mysqli_num_rows($notes_result)
					];
					echo "<tr class = 'user-line' onclick = 'seeRegister({$notes->pageCode}, \"user_id\",{$user["id"]})' >";
					createTLine($table_line, 4);
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>


<!-- Header -->

<header class = "text-center mb-4 mt-4" >
		
	<h3 class = "text-center" >Dados de Usuário</h3>

	<h5>Mantenha seus dados atualizados</h5>

</header>

<form method = "POST" action = "profile/update_validation.php" class = "box-content box-center box-form">
			
	<!-- Name -->

	<div class = "form-group" >
		
		<label for = "name-input" class = "form-label" >

			Nome

		</label>

		<input type = "text" name = "name" id = "name-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu nome" value = "<?php if(isset($_SESSION['update_name'])){ echo $_SESSION['update_name']; }else{ echo $_SESSION["user"]["name"]; } ?>" maxlength = "25" required autofocus>

		<div class = "text-right" >
			
			<small class = "text-info" >

				Somente primeiro nome

			</small>

		</div>

	</div>

	<!-- Nick Name -->

	<div class = "form-group" >
		
		<label for = "nickname-input" class = "form-label" >

			Apelido

		</label>

		<input type = "text" name = "nickname" id = "nickname-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu apelido" value = "<?php if(isset($_SESSION['update_nickname'])){ echo $_SESSION['update_nickname']; }else{ echo $_SESSION["user"]["nickname"]; } ?>" maxlength = "25">

		<div class = "text-right" >
			
			<small class = "text-info" >

				Digite um apelido único

			</small>

		</div>

	</div>

	<!-- Enviar -->

	<div class = "row form-group">
		
		<div class = "text-left col-sm-8 mt-1 " >
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["update_validation"])) {
						
						//Name

						if (!$_SESSION["update_validation"]["name"]) {
							
							echo "Nome inválido";

						}

						//Nickname

						if (!$_SESSION["update_validation"]["nickname"]) {
							
							echo "Apelido já em uso" . "<br>";

						}

						//OK

						if ($_SESSION["update_validation"]["nickname"] && $_SESSION["update_validation"]["name"]) {
							
							echo "Dados atualizados!";

							unset($_SESSION["update_validation"]);

						}

					}

				?>

			</small>

		</div>

		<div class = "col-sm-4 text-right submit-button" >
			
			<button type = "submit" class = "btn btn-info">
			
				Enviar

			</button>

		</div>

	</div>

</form>
<header id = "register-header" class = "text-center mt-4" >
	 
	<h3>Registre sua conta</h3>

	<h5>Crie histórias, anotações e muito mais!</h5>

</header>

<form method = "POST" action = "register/register_validation.php" class = "box-content box-form box-center">
			
	<!-- Name -->

	<div class = "form-group" >
		
		<label for = "name-input" class = "form-label" >

			Nome

		</label>

		<input type = "text" name = "name" id = "name-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu nome" value = "<?php if(isset($_SESSION['register_name'])) echo $_SESSION['register_name'] ?>" maxlength = "25" required autofocus>

		<div class = "text-right" >
			
			<small class = "text-info" >

				Somente primeiro nome

			</small>

		</div>

	</div>

	<!-- Email -->

	<div class = "form-group" >
		
		<label for = "email-input" class = "form-label">

			E-mail

		</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION['register_email'])) echo $_SESSION['register_email'] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >
				
				Digite um e-mail válido

			</small>

		</div>

	</div>

	<!-- Senha -->

	<div class = "form-group" >
		
		<label for = "password-input" class = "form-label" >
			
			Senha

		</label>

		<input type = "password" name = "password" id = "password-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite sua senha" value = "<?php if(isset($_SESSION['register_password'])) echo $_SESSION['register_password'] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >
				
				8 dígitos, letras e números

			</small>

		</div>

	</div>

	<!-- Enviar -->

	<div class = "row form-group">
		
		<div class = "text-left col-sm-8 mt-1 " >
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["register_validation"])) {
						
						if (!$_SESSION["register_validation"]["name"]) {
							
							echo "Nome inválido" . "<br>";

						}

						if (!$_SESSION["register_validation"]["email"]) {
							
							echo "E-mail já cadastrado" . "<br>";

						}

						if (!$_SESSION["register_validation"]["password"]) {
							
							echo "Senha fraca";

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
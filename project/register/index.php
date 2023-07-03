<header id = "register-header" class = "text-center mt-4" >
	 
	<h3>Registre sua conta</h3>

	<h5>Crie histórias, anotações e muito mais!</h5>

</header>

<form method = "POST" action = "register/register_validation.php" class = "box-content">
			
	<!-- Name -->

	<div class = "mb-3" >
		
		<label for = "name-input" class = "form-label" >

			Nome

		</label>

		<input type = "text" name = "name" id = "name-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu nome" value = "<?php if(isset($_SESSION['name-input'])) echo $_SESSION['name-input'] ?>" maxlength = "25" required autofocus>

		<div class = "text-right" >
			
			<small class = "text-info" >

				Somente primeiro nome

			</small>

		</div>

	</div>

	<!-- Email -->

	<div class = "mb-3" >
		
		<label for = "email-input" class = "form-label">

			E-mail

		</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION['email-input'])) echo $_SESSION['email-input'] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >
				
				Digite um e-mail válido

			</small>

		</div>

	</div>

	<!-- Senha -->

	<div class = "mb-3" >
		
		<label for = "password-input" class = "form-label" >
			
			Senha

		</label>

		<input type = "password" name = "password" id = "password-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite sua senha" value = "<?php if(isset($_SESSION['password-input'])) echo $_SESSION['password-input'] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >
				
				8 dígitos, letras e números

			</small>

		</div>

	</div>

	<!-- Enviar -->

	<div class = "row">
		
		<div class = "text-left col-sm-8 mt-1 " >
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["register_validation"])) {
						
						if (!$_SESSION["register_validation"]["name"]) {
							
							echo "Nome inválido";

						}

						if (!$_SESSION["register_validation"]["email"]) {
							
							echo "E-mail já cadastrado";

						}

						if (!$_SESSION["register_validation"]["password"]) {
							
							echo "Senha fraca";

						}

					}

				?>

			</small>

		</div>

		<div class = "col-sm-4 text-right pr-0" >
			
			<button type = "submit" class = "btn btn-info">
			
				Enviar

			</button>

		</div>

	</div>

</form>
<?php

	unset($_SESSION["password_sent"]);

	createHeader(

	"Entre em sua conta",
	"Faça login para visualizar histórias e anotações privadas!"

	);

?>

<form method = "POST" action = "login/login_validation.php<?php if (isset($_GET["redirect"])) echo "?redirect={$_GET["redirect"]}" ?>" class = "box-content box-form box-center" >
			
	<!-- E-mail -->

	<div class = "form-group" >
		
		<label for = "email-input" class = "form-label" >E-mail</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION["login_email"])) echo $_SESSION["login_email"] ?>" required autofocus >

	</div>

	<!-- Password -->

	<div class = "form-group" >
		
		<label for = "password-input" class = "form-label" >Senha</label>

		<input type = "password" name = "password" id = "password-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite sua senha" value = "<?php if(isset($_SESSION["login_password"])) echo $_SESSION["login_password"] ?>" required>

		<div class = "text-right" >
		
			<small>
				
				<a href = "?page=<?php echo $password->pageCode ?>" class = "text-danger" >Esqueceu sua senha?</a>

			</small>

		</div>

	</div>

	<!-- Send -->

	<div class = "row form-group" >
		
		<div class = "col-sm-8 text-left mt-1">
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["login_validation"])) {
						
						if (!$_SESSION["login_validation"]["email"]) {
							
							echo "E-mail não existente" . "<br>";

						}

						if (!$_SESSION["login_validation"]["password"]) {
							
							echo "Senha incorreta";

						}

					}

				?>

			</small>

		</div>

		<div class = "col-sm-4 text-right submit-button" >
			
			<button type = "submit" class = "btn btn-info" >
				
				Entrar

			</button>

		</div>

	</div>

</form>
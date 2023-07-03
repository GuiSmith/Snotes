<?php

	unset($_SESSION["password_sent"]);

?>

<header class = "text-center mt-4" >

	<h3>Entre em sua conta</h3>
	 
	<h5>Faça login para visualizar histórias e anotações privadas!</h5>

</header>

<form method = "POST" action = "login/login_validation.php" class = "box-content" >
			
	<!-- E-mail -->

	<div class = "mb-3" >
		
		<label for = "email-input" class = "form-label" >E-mail</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION["email-input"])) echo $_SESSION["email-input"] ?>" required autofocus >

	</div>

	<!-- Password -->

	<div class = "mb-3" >
		
		<label for = "password-input" class = "form-label" >Senha</label>

		<input type = "password" name = "password" id = "password-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite sua senha" value = "<?php if(isset($_SESSION["password-input"])) echo $_SESSION["password-input"] ?>" required>

		<div class = "text-right" >
		
			<small>
				
				<a href = "?page=16119192315184" class = "text-danger" >Esqueceu sua senha?</a>

			</small>

		</div>

	</div>

	<!-- Send -->

	<div class = "row" >
		
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

		<div class = "col-sm-4 text-right pr-0" >
			
			<button type = "submit" class = "btn btn-info" >
				
				Entrar

			</button>

		</div>

	</div>

</form>
<?php

	unset($_SESSION["password_sent"]);

	if (isset($_SESSION["logged"])) {
		
		if ($_SESSION["logged"]) {
			
			header("Location: main.php?page=192015199519");

		}

	}else{

		$_SESSION["logged"] = false;

	}

?>

		<form method = "POST" action = "login/login_validation.php" class = "ml-3 mt-3" style = "width: 20%" >
					
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
						
						<a href = "?page=16119192315184" class = "text-info" >Esqueceu sua senha?</a>

					</small>

				</div>

			</div>

			<div class = "row ml-0 mr-0" >
				
				<div class = "col-sm-8 text-left mt-1" style = "padding: 0" >
					
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

				<div class = "col-sm-4 text-right" >
					
					<button type = "submit" class = "btn btn-info" >
						
						Entrar

					</button>

				</div>

			</div>

		</form>
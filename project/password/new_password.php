<?php createHeader(

	"Crie sua senha",
	"Pense em uma nova senha!"

	)

?>

<form method = "POST" action = "password/new_password_validation.php?passcode=<?php echo $_GET["passcode"] ?>" class = "box-content box-form box-center">

	<!-- Password -->
	
	<div class = "form-group" >
		
		<label for = "password-input" class = "form-label" >Senha</label>

		<input type = "password" name = "password" id = "password-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite sua senha" value = "<?php if(isset($_SESSION["password-input"])) echo $_SESSION["password-input"] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >

				8 dígitos, letras e números

			</small>

		</div>

	</div>

	<!-- Confirmation -->

	<div class = "form-group" >
		
		<label for = "password-confirmation-input" class = "form-label" >Confirmação</label>

		<input type = "password" name = "password-confirmation" id = "password-confirmation-input" class = "form-control" placeholder = "Digite aqui..." title = "Confirme sua senha" value = "<?php if(isset($_SESSION["password-confirmation-input"])) echo $_SESSION["password-confirmation-input"] ?>" required>

		<div class = "text-right" >
			
			<small class = "text-info" >

				Confirme sua senha

			</small>

		</div>

	</div>

	<!-- Send Button -->

	<div class = "row form-group" >

		<div class = "col-sm-8 text-left mt-1" style = "padding: 0" >
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["password_validation"])) {

						switch ($_SESSION["password_validation"]) {
							
							case 'fraca':
								
								echo "Senha fraca demais";
								break;

							case false:

								echo "Senha não confirma";
								break;
							
							default:
								
								echo "error";
								break;
						}
						
					}

				?>

			</small>

		</div>
		
		<div class = "col-sm-4 text-right submit-button" >
			
			<button type = "submit" class = "btn btn-info" >
				
				Enviar

			</button>

		</div>

	</div>

</form>
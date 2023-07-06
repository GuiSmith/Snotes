<div id = "form-header" >
	
	<?php createHeader(

		"Digite seu e-mail",
		"Verifique seu e-mail e atualize sua senha!"

		)

	?>

</div>

<form id = "form" method = "POST" action = "password/password_validation.php" class = "box-content box-form box-center">
			
	<!-- E-mail -->

	<div class = "form-group" >
		
		<label for = "email-input" class = "form-label" >E-mail</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION['email-input'])) echo $_SESSION['email-input'] ?>" required autofocus >

	</div>

	<!-- Send Button -->

	<div class = "row form-group" >

		<div class = "col-sm-8 text-left mt-1" style = "padding: 0" >
			
			<small class = "text-danger" >
				
				<?php

					if (isset($_SESSION["password_sent"])) {

						if (!$_SESSION["password_sent"]) {
							
							echo "E-mail não cadastrado";

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

<div id = "sent-header" >
	
	<?php createHeader(

		"E-mail enviado!",
		"Verifique seu e-mail e atualize sua senha!"

		)

	?>

</div>

<script>
	
	const formHeader = document.getElementById("form-header");
	const form = document.getElementById("form");
	const sentHeader = document.getElementById("sent-header");

	if (

		<?php

			if (isset($_SESSION["password_sent"]) && $_SESSION["password_sent"]) {

				echo "true";

			}else{

				echo "false";

			}

		?>

	) {

		formHeader.style.display = "none";

		form.style.display = "none";

		sentHeader.style.display = "block";

	}else{

		formHeader.style.display = "block";

		form.style.display = "block";

		sentHeader.style.display = "none";

	}

</script>
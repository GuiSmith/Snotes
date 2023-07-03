<form id = "form" method = "POST" action = "password/password_validation.php" class = "unlogged-form">
			
	<!-- E-mail -->

	<div class = "mb-3" >
		
		<label for = "email-input" class = "form-label" >E-mail</label>

		<input type = "email" name = "email" id = "email-input" class = "form-control" placeholder = "Digite aqui..." title = "Digite seu e-mail" value = "<?php if(isset($_SESSION['email-input'])) echo $_SESSION['email-input'] ?>" required autofocus >

	</div>

	<!-- Send Button -->

	<div class = "row" >

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
		
		<div class = "col-sm-4 text-right pr-0" >
			
			<button type = "submit" class = "btn btn-info" >
				
				Enviar

			</button>

		</div>

	</div>

</form>

<div id = "message" class = "text-center unlogged-form" >

	<h3>E-mail enviado!</h3>

	<p>
		
		Verifique o link em seu e-mail!

	</p>

	<div class = "text-center" >
		
		<button class = "btn btn-info" >
			
			<a href = "?page=12157914" style = "text-decoration: none;color: white;">Voltar</a>

		</button>

	</div>

</div>

<script>
	
	const form = document.getElementById("form");
	const message = document.getElementById("message");

	if (

		<?php

			if (isset($_SESSION["password_sent"]) && $_SESSION["password_sent"]) {

				echo "true";

			}else{

				echo "false";

			}

		?>

	) {

		form.style.display = "none";

		message.style.display = "block";

	}else{

		form.style.display = "block";

		message.style.display = "none";

	}

</script>
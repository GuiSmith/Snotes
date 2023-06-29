<div class = "row" >
	
	<div class = "col-sm-6" >
		
		<h2 class = "text-center" >Perfil</h2>

	</div>

	<div class = "col-sm-6" >
		
		<h2 class = "text-center" >Configurações</h2>

	</div>

</div>

<!-- página de exemplo teste -->

<div>
	
	<h2>
		
		Boas vindas <?php echo $_SESSION["user"]["name"] ?>

	</h2>

	<h5>Dados:</h5>

	<ul>
		
		<li>
			
			Nome: <?php echo $_SESSION["user"]["name"] ?>

		</li>

		<li>
			
			E-mail: <?php echo $_SESSION["user"]["email"] ?>

		</li>

		<li>
			
			Criação: <?php echo $_SESSION["user"]["created_at"] ?>

		</li>

		<li>
			
			Atualização: <?php echo $_SESSION["user"]["updated_at"] ?>

		</li>

		<li>
			
			Login: <?php echo $_SESSION["user"]["logged_at"] ?>

		</li>

	</ul>

</div>

<?php //foreach ($_SESSION["user"] as $key => $value) echo $key . ": " . $value . "<br>"; ?>
<?php

	createHeader(
		"Boas vindas ao Snotes!",
		"Anote o que precisa ou leia o que quiser!"

	);

?>

<section class = "row" >
	<div class = "col-sm-4" >
		<img src = "media/home/note.png" class = "animated-image" >
	</div>
	<div class = "col-sm-8" >
		<div class = "box-content box-center box-text" >
			<?php
				//Snotes
				$text = [
					"Snotes é um site incrível que permite que você organize suas ideias, pensamentos e histórias de maneira fácil e intuitiva. Com Snotes, você pode criar anotações de forma conveniente e classificá-las de acordo com sua privacidade."
				];
				createTextBlock(
					"Snotes",
					$text,
				);

				//Anotações
				$text = [
					"Com as anotações, você pode registrar suas observações diárias, listar tarefas importantes ou até mesmo escrever seus pensamentos mais íntimos. As anotações podem ser pessoais, permitindo que você mantenha suas reflexões privadas, ou privadas, para que outras pessoas possam ver ao entrar em seu usuário."
				];
				createTextBlock(
					"Anotações",
					$text
				);

				//Histórias
				$text = [
					"Com o editor de texto Summernote, desenvolvido por <a href = \"https://summernote.org/team/\" >Alan e seu time</a>, é possível utilizar Snotes para criar histórias, assim você pode soltar sua criatividade e compartilhar experiências significativas. Elas podem ser pessoais, servindo como um diário online, ou privadas, permitindo que você compartilhe suas memórias com outras pessoas."
				];
				createTextBlock(
					"Histórias",
					$text
				);
			?>
		</div>
	</div>
</section>

<article class = "row" >
	<div class = "col-sm-8" >
		<div class = "box-content box-center box-text" >
			<?php
				//Privacidade
				$text = [
					"No Snotes, sua privacidade é uma prioridade. Você terá total controle sobre quem pode ver suas anotações e histórias. Além disso, a plataforma é projetada com simplicidade e facilidade de uso em mente, para que você possa se concentrar no que realmente importa: suas palavras e suas histórias."
				];
				createTextBlock(
					"Privacidade",
					$text
				);

				//Arquivo PDF
				$text = [
					"Utilizando uma biblioteca da linguagem JavaScript, você pode realizar o download de sua anotação ou história no formato PDF! Apenas clique no ícone PDF no canto superior direito de sua anotação e o download do arquivo será realizado. Assim, você pode compartilhar sua anotação com quem ainda não tem o próprio acesso ao Snotes."
				];
				createTextBlock(
					"Arquivo PDF",
					$text
				);

				//Junte-se a nós
				$text = [
					"Então, não espere mais! Junte-se à comunidade do Snotes e comece a explorar um mundo de anotações e histórias cativantes. Deixe sua criatividade fluir, compartilhe suas memórias e descubra a alegria de expressar-se por meio das palavras. Snotes está aqui para ajudá-lo a transformar suas ideias em realidade."
				];
				createTextBlock(
					"Junte-se a nós!",
					$text
				);
			?>
		</div>
	</div>
	<div class = "col-sm-4 text-center" >
		<img src = "media/home/configuration3.png" width = "100%" class = "animated-image" >
	</div>
</article>
<?php createHeader(

	"Origem do Snotes",
	"De provação para aprendizado"

	)

?>

<article class = "row" >
	<div class = "col-sm-4" >
		<img src = "media/origin//think.png" class = "animated-image" >
	</div>
	<div class = "col-sm-8" >
		<div class = "box-content box-center box-text" >
			<?php
				$text = [
					"Por que este projeto foi criado? Quais foram os incentivos, motivos, estímulos, fontes e ferramentas?",
					"Neste momento, falaremos do projeto como um todo, com exceção de seu conteúdo. Ou seja, falaremos dos motivos por trás de sua criação, mas não do porquê ser sobre anotação e não histórias ou arquivos, por exemplo."
				];
				createTextBlock(
					"O projeto",
					$text
				);

				$text = [
					"É importante saber a motivação por trás da criação de um projeto. Assim, todas as pessoas envolvidas podem saber onde devem ou querem chegar com essa iniciativa. Além do motivo obrigatório, se adicionado ou repensado um motivo alternativo e pessoal, é possível que os contribuintes possam dar mais de si do que pensavam que podiam.",
					"Minha motivação vem de querer aprender desenvolvimento de sistemas no geral. Sempre focando em entender como as coisas funcionam para então utiliza-las da melhor forma. Salvo os casos em que o ideal é realmente pesquisar a melhor forma de fazer e aprender como faze-la."
				];
				createTextBlock(
					"Motivação",
					$text
				);
			?>
		</div>
	</div>
</article>
<section class = "row" >
	<div class = "col-sm-8" >
		<div class = "box-content box-center box-text" >
			<?php
				$text = [
					"É legal saber os estímulos que os criadores receberam na criação do projeto. Pois é normal desanimar no meio do caminho e nem sempre nossa motivação consegue nos levantar. Os estímulos nos ajudam e nos lembram que não estamos sozinhos nessa jornada, ou mesmo que estejamos, não podemos desanimar por causa disso!",
					"Meu estímulo veio do sentimento de querer sempre fazer um pouco a cada dia, sejam cem lihas de código ou apenas uma, seja uma tela inteira ou um botão. Ir dormir sabendo que avancei em conhecimento e desenvolvimento de meu próprio projeto não tem preço. Nem sempre estamos fazendo o que podemos para melhorar nosso futuro eu, então meu maior estímulo eram coisas que não contribuem para meu desenvolvimento pessoal. Pois me lembrava de onde eu realmente deveria estar."
				];
				createTextBlock(
					"Estímulos",
					$text
				);
			?>
		</div>
	</div>
	<div class = "col-sm-4 text-center" >
		<img src = "media/origin/lamp.png" width = "50%" class = "animated-image" >
	</div>
</section>
<aside class = "row" >
	<div class = "col-sm-5 text-center" >
		<img src = "media/origin/gamer.png" class = "animated-image" >
	</div>
	<div class = "col-sm-7" class="text-center" >
		<div class = "box-content box-center box-text" >
			<?php
				$text = [
					"Há muitas regras implícitas entre jogadores de jogos eletrônicos, os tais chamados \"gamers\". Uma delas é na língua inglesa e diz: \"We can't end on a loss\". Pode ser traduzido para \"não podemos finalizar em uma derrota\". Basicamente, não importa quantas partidas ou batalhas os jogadores tenham perdido, eles absolutamente não podem parar enquanto não ganharem pelo menos uma, mesmo que lhes custem mais derrotas.",
					"Esta regra está guardada em um canto do meu coração por causa de uma interpretação única. Independente do que aconteça no dia, devo apenas finalizar o dia após conseguir pelo menos uma vitória. Por mais pequena que pareça ser para qualquer um, para mim, significa um passo. Se todo dia eu der um passo, é impossível que eu esteja no mesmo lugar amanhã ou daqui um ano."
				];
				createTextBlock(
					"Incentivos",
					$text
				);
			?>
		</div>
	</div>
</aside>

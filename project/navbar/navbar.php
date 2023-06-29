<div class = "row topBar mr-0 ml-0" >

	<div class = "col-sm-1 text-left" >
		
		<img src = "media/logo.png" width = "50">

	</div>

	<div class = "col-sm-5 text-right">
		
		<h1 id = "navbar-title" ></h1>

	</div>

	<div class = "col-sm-6 text-right pr-4">
		
		<ul class = "options" >
			
				<?php

					for ($i = 0; $i < count($objects); $i++) {

						if ($objects[$i]->displayState) {

							if ($objects[$i]->logged == "both") {
								
								echo "<li class = 'option' ><a href = '?page=" . $objects[$i]->pageCode .  "'>" . $objects[$i]->displayName . "</a></li>";

							}
							
							if ($_SESSION["logged"]) {
								
								if ($objects[$i]->logged == "yes") {
									
									echo "<li class = 'option' ><a href = '?page=" . $objects[$i]->pageCode .  "'>" . $objects[$i]->displayName . "</a></li>";

								}

							}else{

								if ($objects[$i]->logged == "no") {
									
									echo "<li class = 'option' ><a href = '?page=" . $objects[$i]->pageCode .  "'>" . $objects[$i]->displayName . "</a></li>";

								}

							}	

						}
						
					}

				?>

		</ul>

	</div>

</div>
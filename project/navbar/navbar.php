<div class = "row topBar" >

	<div class = "col-sm-1 text-left" >
		
		<img id = "navbar-logo" src = "media/logo.png" width = "45" onclick = "redirect()">

	</div>

	<div class = "col-sm-11 text-right">
		
		<ul class = "options" >
			
				<?php

					for ($i = 0; $i < count($objects); $i++) {

						if ($objects[$i]->displayState) {

							if ($objects[$i]->logged == "both") {

								createItemLink($objects[$i]->pageCode,$objects[$i]->displayName);
								
							}
							
							if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
								
								if ($objects[$i]->logged == "yes") {

									createItemLink($objects[$i]->pageCode,$objects[$i]->displayName);
									
								}

							}else{

								if ($objects[$i]->logged == "no") {

									createItemLink($objects[$i]->pageCode,$objects[$i]->displayName);
									
								}

							}	

						}
						
					}

				?>

		</ul>

	</div>

</div>
<div class = "row topBar" >

	<div class = "col-sm-1 text-left" >
		
		<img src = "media/logo.png" width = "45" class = "mt-1">

	</div>

	<div class = "col-sm-11 text-right">
		
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
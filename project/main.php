<?php

	session_start();

	require "../connection.php"; //Database
	require "sources.php"; //Options and functions

?>

<!DOCTYPE html>
<html>
	
	<head>
	
		<meta charset="utf-8">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

		<!-- CSS -->

		<!-- Navbar -->
		<link rel="stylesheet" type="text/css" href = "navbar/navbar.css">

		<!-- Page Style -->
		<link rel="stylesheet" type="text/css" href = "index.css">

		<!-- Selected Page -->
		<link id = "page-style" rel="stylesheet" type="text/css" >

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href = "media/logo.png">
	
		<title>Home</title>
	
	</head>
	
	<body >

		<?php require "navbar/navbar.php" ?>

		<section id = "current_page" >
			
			<?php

				switch (true) {

					// Page
					
					case (isset($_GET["page"])):
						
						for ($i=0; $i < count($objects); $i++) {
						
							if ($_GET["page"] == $objects[$i]->pageCode) {

								if ($objects[$i]->logged == "yes" && (!$_SESSION["logged"] || !isset($_SESSION["logged"]))) {
									
									header("Location: main.php?page=" . $login->pageCode . "&redirect=" . $objects[$i]->pageCode);

								}else{

									if ($objects[$i]->logged == "no" && (isset($_SESSION['logged']) && $_SESSION['logged'])) {
										
										header("Location: main.php?page=" . $origin->pageCode);

									}else{

										require $objects[$i]->fileName . "/index.php";

										$page_style = $objects[$i]->fileName;

										$page_title = $objects[$i]->displayName;

									}

								}
								
								break;

							}

						}

						break;

					// Passcode

					case (isset($_GET["passcode"])):

						$page_passcode = $_GET["passcode"];

						$page_passcode_sql = "SELECT passcode FROM users WHERE passcode = '$page_passcode'";

						$page_passcode_result = mysqli_query($conn, $page_passcode_sql);

						if (mysqli_num_rows($page_passcode_result) > 0) {
							
							require "password/new_password.php";

						}

						break;

					case (isset($_GET["note"])):
					
					// Note

					case (isset($_GET["note"])):

						if (!$_SESSION["logged"]) {
							
							header("Location: main.php?page=" . $login->pageCode);

						}else{

							$note_id = $_GET["note"];

							$note_sql = "SELECT text FROM notes WHERE id = '$note_id'";

							$note_result = mysqli_query($conn, $note_sql);

							if (mysqli_num_rows($note_result) == 1) {
								
								$note = mysqli_fetch_assoc($note_result);

								echo "<div class = 'box-center box-content box-editor' >";

								echo $note["text"];

								echo "</div>";

							}

						}

					break;

					default:
						// code...
						break;
				}

				// if (isset($_GET["page"])) {

				// 	for ($i=0; $i < count($objects); $i++) {
						
				// 		if ($_GET["page"] == $objects[$i]->pageCode) {

				// 			if ($objects[$i]->logged == "yes" && (!$_SESSION["logged"] || !isset($_SESSION["logged"]))) {
								
				// 				header("Location: main.php?page=" . $login->pageCode . "&redirect=" . $objects[$i]->pageCode);

				// 			}else{

				// 				if ($objects[$i]->logged == "no" && (isset($_SESSION['logged']) && $_SESSION['logged'])) {
									
				// 					header("Location: main.php?page=" . $home->pageCode);

				// 				}else{

				// 					require $objects[$i]->fileName . "/index.php";

				// 					$page_style = $objects[$i]->fileName;

				// 					$page_title = $objects[$i]->displayName;

				// 				}

				// 			}
							
				// 			break;

				// 		}

				// 	}
					
				// }else{

				// 	if (isset($_GET["passcode"])) {

				// 		$page_passcode = $_GET["passcode"];

				// 		$page_passcode_sql = "SELECT passcode FROM users WHERE passcode = '$page_passcode'";

				// 		$page_passcode_result = mysqli_query($conn, $page_passcode_sql);

				// 		if (mysqli_num_rows($page_passcode_result) > 0) {
							
				// 			require "password/new_password.php";

				// 		}
						
				// 	}

				// }

			?>

		</section>

		<script>

			//Title
			
			document.title = "<?php echo $page_title ?>";

			console.log(document.title);

			//Page Style

			page_style = document.getElementById("page-style");

			page_style.href = "<?php echo $page_style ?>/index.css";

			console.log(page_style.style.src);

			//Redirect

			function redirect(){

				var confirmed = window.confirm("Tem certeza de que deseja sair? Seu progresso será perdido!");

				if (confirmed) {

					window.location.href = "?page=<?php echo $home->pageCode ?>";

				}else{

					alert("ok");

				}

			}

			//Text editor

			$(document).ready(function() {
          $('#summernote').summernote();
      });

      $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
      });

      $(document).ready(function() {
        $('#summernote').summernote({
          lang: 'pt-BR' // default: 'en-US'
        });
      });
			
		</script>

	</body>

</html>
<?php

	session_start();

	require "../connection.php";
	require "sources.php";

?>

<!DOCTYPE html>
<html>
	
	<head>
	
		<meta charset="utf-8">
	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSS -->

		<!-- Navbar -->
		<link rel="stylesheet" type="text/css" href = "navbar/navbar.css">

		<!-- Page Style -->

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href = "media/logo.png">
	
		<title>Home</title>
	
	</head>
	
	<body>

		<?php

			require "navbar/navbar.php";

			if (isset($_GET["page"])) {

				for ($i=0; $i < count($objects); $i++) {
					
					if ($_GET["page"] == $objects[$i]->pageCode) {
						
						require $objects[$i]->fileName . "/index.php";

						$page_title = $objects[$i]->displayName;

						break;

					}

				}
				
			}else{

				if (isset($_GET["passcode"])) {

					$page_passcode = $_GET["passcode"];

					$page_passcode_sql = "SELECT passcode FROM users WHERE passcode = '$page_passcode'";

					$page_passcode_result = mysqli_query($conn, $page_passcode_sql);

					if (mysqli_num_rows($page_passcode_result) > 0) {
						
						require "password/new_password.php";

					}
					
				}

			}

		?>

		<script>

			const navbarTitle = document.getElementById("navbar-title").innerHTML = "<?php echo $page_title ?>";
			
			document.title = "<?php echo $page_title ?>";

			console.log(document.title);
			
		</script>

	</body>

</html>
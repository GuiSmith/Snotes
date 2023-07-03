<?php

	require "../../connection.php";

	$name = "Guilherme";
	$nickname = "Tec";
	$id = 14;

	$update_sql = "UPDATE users SET name = '$name', nickname = '$nickname' WHERE ID = '$id'";

	$update_result = mysqli_query($conn, $update_sql);

	if ($update_result) {
		
		echo "ok";

	}else{

		echo "not ok";

	}

?>
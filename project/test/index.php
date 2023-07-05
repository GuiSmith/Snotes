<?php

    require "../../connection.php";

    $sql = "SELECT * FROM notes WHERE id = 1";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    echo $row["title"] . "<br>";
    echo $row["text"];

?>
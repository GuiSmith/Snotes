<?php

  require "../../connection.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $date_start = $_POST['datetime-start'];
    $date_end = $_POST['datetime-end'];

    echo $date_start . "<Br>";

    $sql = "SELECT created_at FROM notes WHERE id = 31";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    echo $row["created_at"];

    /*
    $datetimeLocalObj = DateTime::createFromFormat('Y-m-d\TH:i', $datetimeLocal);
    $datetimeLocalFormatted = $datetimeLocalObj->format('Y-m-d H:i:s');

    $query = "SELECT * FROM notes WHERE created_at BETWEEN '$datetimeLocalFormatted' AND '$datetimeEnd'";

    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      
      echo $row["title"] . "<br>";

    }
    */

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Date Range Filter</title>
  </head>
  <body>
    
    <h1>Date Range Filter</h1>

    <form method="POST" action="">

      <label for="datetime-start">Select a Start Date and Time:</label>

      <input type="datetime-local" id="datetime-start" name="datetime-start" required><br>

      <label for="datetime-end">Select an End Date and Time:</label>

      <input type="datetime-local" id="datetime-end" name="datetime-end" required><br>

      <button type="submit">Filter</button>

    </form>

  </body>

</html>

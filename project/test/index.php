<?php

  require "../../connection.php";

  require "../sources.php";

  $table_header = [

    "id" => "ID",
    "title" => "Título",
    "created_at" => "Criação",
    "user_id" => "Autor",
    "updated_at" => "Alteração",
    "visibility" => "Visibilidade"

  ];

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $sql = "SELECT * FROM notes WHERE active = true";

    $filter_option = $_POST["filter_option"];
    $filter_text = $_POST["filter_text"];

    for ($i=0; $i < count($filter_option); $i++) {
      
      $sql .= " AND ";

      switch ($filter_option[$i]) {
          
        case "id":
          
          $sql .= "{$filter_option[$i]} = {$filter_text[$i]}";

          break;

        case "title":
        case "user_id":
        case "visibility":

          $sql .= "{$filter_option[$i]} LIKE %{$filter_text[$i]}%";

          break;

        case "created_at":
        case "updated_at":

          $sql .= "{$filter_option}";

          break;
        
        default:
          
          // $sql += "other: {$filter_option[$i]}";

          break;
      }

      echo "<br>";

    }

    echo $sql;

  }

?>

<!DOCTYPE html>
<html>
  <head>

    <title>Date Range Filter</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    
    <form method="POST" id = "form" action="" style = "border: solid 1px black; width: 50%;margin: 1em;padding: 0.5em">

      <h2>Form</h2>

      <button type = "button" onclick = "clone()" >+</button>
      <button type="submit">Enviar</button>

      <div id = "main-group" class = "form-group" >

      <select name = "filter_option[]">
      
        <?php createOption($table_header); ?>
      
      </select>
        
      <input type = "text" name = "filter_text[]" class = "" >

      </div>

    </form>

    <script>

      var groups = 1;
      
      function clone(){

        const form = document.getElementById("form");
        const group = document.getElementById("main-group");

        const clonedGroup = group.cloneNode(true);
        clonedGroup.id = "";
        clonedGroup.children[1].value = "";

        form.appendChild(clonedGroup);

        console.log(clonedGroup.id);

      }

    </script>

  </body>

</html>
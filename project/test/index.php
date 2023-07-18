<html>

  <head>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>

      .select-button {

        

      }
    
    </style>
  
  </head>

  <body style = "margin: 1rem" >

    <select id = "select" class = "select-button" onclick = "fuck()" >
      <option value = "none">--</option>
      <option value = "new" >Criar</option>
      <option value="python">Python</option>
      <option value="javascript">JavaScript</option>
      <option value="java">Java</option>
      <option value="csharp">C#</option>
      <option value="ruby">Ruby</option>
      <option value="php">PHP</option>
    </select>

    <script>

      function fuck(){

        const selected = document.getElementById("select").value;

        if(selected == "new"){

          window.location.href = "other.php"; 

        }

      }

    </script>

  </body>

</html>
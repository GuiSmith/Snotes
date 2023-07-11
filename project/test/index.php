<select id = "select" onclick = "search()">

  <option value = "first"  >Primeiro</option>
  <option value = "second" >Segundo</option>
  <option value = "third" selected >Terceiro</option>
  <option value = "fourth" >Quarto</option>
  <option value = "fifth" >Quinto</option>

</select>

<script>

  const options = document.getElementsByTagName();

  function search(){

    const selected_value = document.getElementById("select").value;

    console.log(selected_value);

  }

</script>
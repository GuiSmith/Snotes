<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

<style>
  table {
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }

  th {

  	cursor: pointer;

  }
</style>

<form id = "form" method = "POST" style = "width: 25%;margin: 1rem;" >

	<label for = 'text' class = "form-label" >Texto</label>

	<input type = "text" name = "text" id = "text" class = "form-control" >
	
	<div class = "text-right" >
		
		<span class = "btn btn-info" onclick = "formSubmit()" >Enviar</span>

	</div>

</form>



<table>
  <tr>
  	<form id = "form-table" >
  		<input type = "hidden" name = "text" id = "hidden-input" >
  		<th onclick = "formSubmit('id')" >ID</th>
	    <th onclick = "formSubmit('name')" >Name</th>
	    <th onclick = "formSubmit('age')" >Age</th>
	    <th onclick = "formSubmit('city')" >City</th>
	    <th onclick = "formSubmit('salary')" >Salary</th>
  	</form>
<!--   </tr>
  <tr>
    <td>1</td>
    <td>John</td>
    <td>25</td>
    <td>New York</td>
    <td>50000</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Emma</td>
    <td>28</td>
    <td>London</td>
    <td>65000</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Peter</td>
    <td>32</td>
    <td>Paris</td>
    <td>72000</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Lisa</td>
    <td>29</td>
    <td>Berlin</td>
    <td>55000</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Michael</td>
    <td>45</td>
    <td>Tokyo</td>
    <td>80000</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Sarah</td>
    <td>31</td>
    <td>Sydney</td>
    <td>60000</td>
  </tr>
  <tr>
    <td>7</td>
    <td>David</td>
    <td>37</td>
    <td>Los Angeles</td>
    <td>67000</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Emily</td>
    <td>26</td>
    <td>Toronto</td>
    <td>52000</td>
  </tr>
  <tr>
    <td>9</td>
    <td>James</td>
    <td>29</td>
    <td>Melbourne</td>
    <td>59000</td>
  </tr>
  <tr>
    <td>10</td>
    <td>Amy</td>
    <td>33</td>
    <td>Seoul</td>
    <td>68000</td>
  </tr> -->
</table>

<script>
	
	function formSubmit(column){

		const input = document.getElementById("hidden-input");
		const form = input.parentElement;

		input.name = column;

		console.log("Input name: " + input.name);
		console.log("Form ID: " + form.id);

		// form.submit();

	}

</script>

<?php

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$text = $_POST["text"];
		echo "Texto: {$text}";

	}
	
?>
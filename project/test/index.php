<style>

  table {
    border-collapse: collapse;
  }
  
  td, table {
    border: solid 1px black;
    padding: 5px;
  }

  tr:hover {
    background-color: lightgrey;
    cursor: pointer;
  }

</style>

<table>
  <thead>
    <tr>
      <th onclick = "sortColumn(0)" >Name</th>
      <th onclick = "sortColumn(1)" >Age</th>
      <th onclick = "sortColumn(2)" >Country</th>
      <th onclick = "sortColumn(3)" >Occupation</th>
      <th onclick = "sortColumn(4)" >Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>30</td>
      <td>USA</td>
      <td>Engineer</td>
      <td>john.doe@example.com</td>
    </tr>
    <tr>
      <td>Alice Smith</td>
      <td>25</td>
      <td>Canada</td>
      <td>Teacher</td>
      <td>alice.smith@example.com</td>
    </tr>
    <tr>
      <td>Bob Johnson</td>
      <td>28</td>
      <td>UK</td>
      <td>Software Developer</td>
      <td>bob.johnson@example.com</td>
    </tr>
    <tr>
      <td>Mary Lee</td>
      <td>32</td>
      <td>Australia</td>
      <td>Doctor</td>
      <td>mary.lee@example.com</td>
    </tr>
    <tr>
      <td>Michael Chen</td>
      <td>29</td>
      <td>China</td>
      <td>Business Analyst</td>
      <td>michael.chen@example.com</td>
    </tr>
    <tr>
      <td>Sophia Kim</td>
      <td>27</td>
      <td>South Korea</td>
      <td>Designer</td>
      <td>sophia.kim@example.com</td>
    </tr>
    <tr>
      <td>Ahmed Ali</td>
      <td>31</td>
      <td>Egypt</td>
      <td>Architect</td>
      <td>ahmed.ali@example.com</td>
    </tr>
  </tbody>
</table>

<script>

  var order = "asc";

  function sortColumn(column){

    const table = document.querySelector('table');
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    rows.sort((row1, row2) => {
      const cell1 = row1.children[column].innerText.toLowerCase();
      const cell2 = row2.children[column].innerText.toLowerCase();
      return order === 'asc' ? cell1.localeCompare(cell2, {numeric: true}) : cell2.localeCompare(cell1, {numeric: true});
    });

    order = order == "asc" ? "desc" : "asc";

    rows.forEach(row => tbody.appendChild(row));

  }

  // let currentSortOrder = 'asc';

  // function sortColumn(column) {
  //   const table = document.querySelector('table');
  //   const tbody = table.querySelector('tbody');
  //   const rows = Array.from(tbody.querySelectorAll('tr'));

  //   rows.sort((row1, row2) => {
  //     const cell1 = row1.children[column].innerText.toLowerCase();
  //     const cell2 = row2.children[column].innerText.toLowerCase();
  //     return currentSortOrder === 'asc' ? cell1.localeCompare(cell2, undefined, { numeric: true }) : cell2.localeCompare(cell1, undefined, { numeric: true });
  //   });

  //   currentSortOrder = currentSortOrder === 'asc' ? 'desc' : 'asc';

  //   rows.forEach(row => tbody.appendChild(row));
  // }

</script>
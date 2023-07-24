function seeRegister(pageCode, register, id){

	window.location.href = "?page=" + pageCode + "&" + register + "=" + id;

}

var order = "asc";

function sortColumn(column){

  const table = document.querySelector('table');
  const thead = table.querySelector("thead");
  const headers = Array.from(thead.querySelectorAll('th'));
  const tbody = table.querySelector("tbody");
  const rows = Array.from(tbody.querySelectorAll('tr'));

  if (order == "asc") {
  	if (headers[column].textContent.includes("↓")) {
  		headers[column].textContent = headers[column].textContent.replace("↓", "↑");
  	}else{
  		headers[column].textContent += "↑";
  	}
  }else{
  	if (headers[column].textContent.includes("↑")) {
  		headers[column].textContent = headers[column].textContent.replace("↑", "↓");
  	}else{
  		headers[column].textContent += "↓";
  	}
  }
  
  rows.sort((row1, row2) => {
    const cell1 = row1.children[column].innerText.toLowerCase();
    const cell2 = row2.children[column].innerText.toLowerCase();
    return order === 'asc' ? cell1.localeCompare(cell2, {numeric: true}) : cell2.localeCompare(cell1, {numeric: true});
  });

  order = order == "asc" ? "desc" : "asc";

  rows.forEach(row => tbody.appendChild(row));

}
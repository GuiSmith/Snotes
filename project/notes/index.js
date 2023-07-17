function seeNote(id){

	window.location.href = "?page=<?php echo $see_note->pageCode ?>&note=" + id;

	console.log(id);

}

function search_note(){

	const selected_column_value = document.getElementById("search-options").value;
	console.log("Column value: " + selected_column_value);

	const search_input = document.getElementById("search-bar-input");
	console.log("Searched value: " + search_input);

	if (selected_column_value == "created_at" || selected_column_value == "updated_at"){

		search_input.type = "datetime-local";

	}else{

		search_input.type = "text";

	}

}

function add_filter(){

	const search_form = document.getElementById("search-form");

	const cloned_filters = document.createElement("div");
	cloned_filters.className = "row";

	const elements = document.getElementsByClassName("filter");

	const cloned_options = elements[0].cloneNode(true);
	const cloned_input = elements[1].cloneNode(true);

	search_form.appendChild(cloned_filters);

	cloned_filters.appendChild(cloned_options);
	cloned_filters.appendChild(cloned_input);
	
}
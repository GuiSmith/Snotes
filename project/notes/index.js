function search_note(){

	const selected_column_value = document.getElementById("search-options").value;
	const search_operator_list = document.getElementById("search-operator-list");
	const search_input = document.getElementById("search-bar-input");

	if (selected_column_value == "created_at" || selected_column_value == "updated_at"){

		search_input.type = "datetime-local";
		search_operator_list.disabled = false;

	}else{

		search_input.type = "text";
		search_operator_list.disabled = true;
		search_input.value = "";

	}

}
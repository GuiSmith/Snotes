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

function seeNote(pageCode, id){

	window.location.href = "?page=" + pageCode + "&note=" + id;

	console.log(id);

}

function filter(option, value){

	const option_input = document.getElementById("option-input");
	const text_input = document.getElementById("text-input");
	const clicked_button = document.getElementById("clicked-button");

	const filter_form = document.getElementById("filter-form");

	option_input.value = option;
	text_input.value = value;
	clicked_button.value = option + value;
	console.log("Option: " + option_input.value);
	console.log("Text:" + text_input.value);
	filter_form.submit();

}

function clickedButton(button_id){

	if (button_id != "none" && button_id != "") {
		const button = document.getElementById(button_id);
		button.classList.remove("btn-info");
		button.classList.add("btn-warning");
		// button.style.backgroundColor = "red";
	}
}
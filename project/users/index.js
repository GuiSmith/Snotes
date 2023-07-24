changePattern();

function changePattern(){
	const options = document.getElementById("search-options");
	const input = document.getElementById("search-bar-input");
	switch(options.value.toLowerCase()){
		case "id":
			input.pattern = "[0-9]+";
			input.title = "Somente números";
			break;
		case "name":
			input.pattern = "[a-zA-Z]+";
			input.title = "Somente letras";
			break;
		case "nickname":
			input.removeAttribute("pattern");
			break;
		case "email":
			input.removeAttribute("pattern");
			input.title = "Digite um e-mail válido";
			break;
		default:
			console.log(options.value);
			break;
	}
}
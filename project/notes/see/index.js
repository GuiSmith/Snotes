function confirmSubmit(){
	var operation = document.querySelector("button[name='operation']:focus").value;
	return confirm("Tem certeza de que deseja excluir esta anotação? Essa ação é irreversível!");
}

document.getElementById("export-button").addEventListener("click", function () {
  const note_container = document.getElementById("note-container");
  const note_text = document.getElementById("note-text");
  const note_title = note_container.querySelector("h3").textContent;
  const export_button = document.getElementById("export-button");

   note_text.classList.remove("box-content");
   note_text.classList.remove("box-editor");
   note_text.style.width = "80%";
   export_button.style.display = "none";

   // Add soft line breaks to the content
  const content = note_text.textContent.replace(/\n/g, '<br>');

  // Create a new div to hold the modified content
  const modified_content = document.createElement('div');
  modified_content.innerHTML = content;

  const opt = {
    margin: 10,
    filename: note_title + ".pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
  };

  html2pdf().from(note_container).set(opt).save();
});
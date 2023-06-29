function validateForm() {
    var nameInput = document.getElementById("name");
    var emailInput = document.getElementById("email");

    var nameError = document.getElementById("name-error");
    var emailError = document.getElementById("email-error");

    nameError.innerHTML = "";
    emailError.innerHTML = "";

    var isValid = true;

    if (nameInput.value.trim() === "") {
        nameError.innerHTML = "Name is required.";
        isValid = false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailInput.value)) {
        emailError.innerHTML = "Invalid email address.";
        isValid = false;
    }

    return isValid;
}

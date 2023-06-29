<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Process the form data (e.g., store in a database, send email, etc.)
    // ...

    // Display a success message
    echo "Form submitted successfully. Thank you, $name!";
}
?>

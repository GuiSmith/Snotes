<!DOCTYPE html>
<html>
<head>
    <title>Form Validation Example</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Form Validation Example</h1>
    <form action="process.php" method="post" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <span id="name-error" class="error"></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <span id="email-error" class="error"></span>

        <input type="submit" value="Submit">
    </form>

    <script src="script.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Validation</title>
    <style>
        .error {
            color: red;
            font-size: small;
        }
        .response {
            color: green;
            font-size: medium;
        }
    </style>
    <script>
        function validateForm() {
            let isValid = true;

            // Get form values
            const name = document.getElementById("name").value;
            const phone = document.getElementById("phone").value;
            const age = document.getElementById("age").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            // Get error elements
            const nameError = document.getElementById("nameError");
            const phoneError = document.getElementById("phoneError");
            const ageError = document.getElementById("ageError");
            const emailError = document.getElementById("emailError");
            const passwordError = document.getElementById("passwordError");
            const responseMessage = document.getElementById("responseMessage");

            // Reset error messages
            nameError.textContent = "";
            phoneError.textContent = "";
            ageError.textContent = "";
            emailError.textContent = "";
            passwordError.textContent = "";
            responseMessage.textContent = "";

            // Validate name
            if (name.trim() === "" || !isNaN(name)) {
                nameError.textContent = "Please enter a valid name. Only letters and spaces are allowed.";
                isValid = false;
            }

            // Validate phone number
            if (phone.length !== 10 || isNaN(phone)) {
                phoneError.textContent = "Please enter a valid phone number. It should be a 10-digit number.";
                isValid = false;
            }

            // Validate age
            const ageNum = Number(age);
            if (isNaN(ageNum) || ageNum < 0 || ageNum > 120) {
                ageError.textContent = "Please enter a valid age between 0 and 120.";
                isValid = false;
            }

            // Validate email
            if (email.trim() === "" || !email.includes("@") || !email.includes(".")) {
                emailError.textContent = "Please enter a valid email address.";
                isValid = false;
            }

            // Validate password
            if (password.length < 8 || !/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
                passwordError.textContent = "Please enter a valid password. It should be at least 8 characters long and contain at least one letter and one number.";
                isValid = false;
            }

            if (isValid) {
                responseMessage.textContent = "Form submitted successfully!";
            }
            return isValid;
        }
    </script>
</head>
<body>
    <form onsubmit="return validateForm()" action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <div id="nameError" class="error"></div><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        <div id="phoneError" class="error"></div><br>

        <label for="age">Age:</label>
        <input type="text" id="age" name="age" required>
        <div id="ageError" class="error"></div><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <div id="emailError" class="error"></div><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <div id="passwordError" class="error"></div><br>

        <input type="submit" value="Submit">
    </form>

    <div id="responseMessage" class="response"></div>
</body>
</html>
<?php
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "test"; // Change this to your database name

// Create connections
$con = mysqli_connect("localhost","root","","test");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare and bind
$stmt = $con->prepare("INSERT INTO poo (name, phone, age, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $name, $phone, $age, $email, $password);

// Set parameters and execute
$name = $_POST['name'];
$phone = $_POST['phone'];
$age = intval($_POST['age']);
$email = $_POST['email'];
$password = $_POST['password'];

if ($stmt->execute()) {
    echo "<p class='response'>New record created successfully</p>";
} else {
    echo "<p class='error'>Error: " . $stmt->error . "</p>";
}

$stmt->close();
$con->close();
?>
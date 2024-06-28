<?php

include('db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $services = $_POST['services'];
    $message = $_POST['message'];
   
   
        $stmt = $con->prepare("INSERT INTO `contact`(`name`, `email`, `phone`, `date`,`services`,`message`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone,$date, $services, $message);

        if ($stmt->execute()) {
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    mysqli_close($con);


?>

<?php
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "customer"; // Change this to your database name

// Create connections
$con = mysqli_connect("localhost","root","","customer");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

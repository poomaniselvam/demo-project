<?php
session_start();
include('db_connect.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $con->prepare("SELECT * FROM admin_user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if ($row['password'] === $password) {
            // Password is correct, create session
            $_SESSION['email'] = $row['email']; // Store email in session
            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);
            // Return success response as JSON
            echo json_encode(["success" => true]);
            exit(); // Stop further execution
        } else {
            // Password is incorrect
            echo json_encode(["error" => "Invalid email or password"]);
            exit(); // Stop further execution
        }
    } else {
        // User does not exist
        echo json_encode(["error" => "Invalid email or password"]);
        exit(); // Stop further execution
    }
    
    // Close database connection
    $stmt->close();
    mysqli_close($con);
}
?>

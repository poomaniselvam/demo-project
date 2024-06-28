<?php
// Include database connection
include('db_connect.php');

// Check if ID is provided and valid
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    // Get the ID to be deleted
    $id = $_POST['id'];
    $query = "DELETE FROM services WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Deletion successful
        echo json_encode(array('success' => true));
        exit();
    } else {
        // Deletion failed
        echo json_encode(array('success' => false, 'message' => 'Failed to delete service.'));
        exit();
    }
} else {
    // ID not provided or invalid
    echo json_encode(array('success' => false, 'message' => 'Invalid request.'));
    exit();
}
?>

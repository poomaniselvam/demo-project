<?php

include('db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $description= $_POST['description'];

    // Check if image file is uploaded
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            // Check file size
            if ($_FILES['image']['size'] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            $allowed_formats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_formats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    echo "The file ". basename($_FILES['image']['name']). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        // Handle case where image file is not uploaded
        echo "Image file is required.";
        $uploadOk = 0;
    }

    // If image upload was successful, proceed with database insertion
    if ($uploadOk == 1) {
        // Prepare and execute SQL statement
        $stmt = $con->prepare("INSERT INTO `services`(`title`, `description`, `image`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $image);

        if ($stmt->execute()) {
            header("Location: service.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    mysqli_close($con);
}

?>

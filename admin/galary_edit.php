<?php
// Include database connection
include('db_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch service details based on ID
    $query = "SELECT * FROM galary  WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    
        // Check if image file is uploaded
        if (isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is valid
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

        // If image upload was successful, proceed with database update
        if ($uploadOk == 1) {
            // Update service details in the database
            $update_query = "UPDATE galary SET  image='$image' WHERE id=$id";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                echo "<script>alert('Service updated successfully');</script>";
                // Redirect to the updated service page
                header("Location: galary.php");
                exit();
            } else {
                echo "<script>alert('Failed to update service');</script>";
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galary</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Galary</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
           
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update Galary</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
} else {
    echo "Invalid ID.";
}
?>

<?php
// Include database connection
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate ID
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $title = $_POST['title'];
        $description = $_POST['description'];

        // Check if image file is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
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
            $image = ''; // Use existing image or set to empty if no image is uploaded
        }

        // If image upload was successful or no new image was uploaded, proceed with database update
         
            // Update service details in the database
            $update_query = "UPDATE services SET title='$title', description='$description'";
            if (!empty($image)) {
                $update_query .= ", image='$image'";
            }
            $update_query .= " WHERE id=$id";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                echo "<script>alert('Service updated successfully');</script>";
                // Redirect to the updated service page
                header("Location: service.php");
                exit();
            } else {
                echo "<script>alert('Failed to update service');</script>";
            }
        
    } else {
        echo "Invalid ID.";
    }
}

// Fetch service details based on ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM services WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Service</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
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

<?php
// Include database connection
include('db_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch service details based on ID
    $query = "SELECT * FROM contact WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $service = $_POST['services'];
        $message = $_POST['message'];

        // 
         
            // Update service details in the database
            $update_query = "UPDATE contact SET name='".$name."',email='".$email."',phone='".$phone."',date='".$date."',services='".$service."', message='".$message."' WHERE id=$id";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                echo "<script>alert('Service updated successfully');</script>";
                // Redirect to the updated service page
                header("Location: contact.php");
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
    <title>Edit Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2>Edit contact</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="title" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <textarea class="form-control" id="email" name="email"><?php echo $row['email']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control-file" id="phone" value="<?php echo $row['phone']; ?>" name="phone">
            </div>
            <div class="form-group">
                <label for="data"></label>
                <input type="daTE" class="form-control-file" value="<?php echo $row['date']; ?>" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="phone">services</label>
                <input type="text" class="form-control-file" value="<?php echo $row['services']; ?>" id="services" name="services">
            </div>
            <div class="form-group">
                <label for="phone">messege</label>
                <input type="text" class="form-control-file" value="<?php echo $row['message']; ?>" id="message" name="message">
            </div>


            <button type="submit" class="btn btn-primary">Update contact</button>   
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

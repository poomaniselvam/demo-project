<?php
$conn = new mysqli('localhost', 'root', '', 'customer');
                
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided and valid

    $id = $_GET['id'];
    $query = "DELETE FROM team WHERE id = '".$id."'";
     $result=mysqli_query($conn,$query);
     if($result){
        echo "data deleted ";
     }
        else{
            echo "error";
        }

     

?>

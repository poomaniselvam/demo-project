<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Gmail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Gmail" pattern="[a-z0-9._%+-]+@gmail\.com$" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
             </div>
            <div class="form-group">
            <label for="state">State :</label>
            <option>Select State</option>
</div>
<div>
           <div class="form-group">
                <input type="submit" value="Submit">
            </div>
<div>
        
        </form>
    </div>

    <?php
    
        $conn = new mysqli('localhost', 'root', '', 'customer');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $state="SELECT  state_id FROM states";

        $state_query=mysqli_query($conn,$state);
?>
            <select type="text" name="state" id="state" class="form-control" required> 

        while($row= mysqli_fetch_assoc($state_query)){
                    echo "<option value='" . htmlspecialchars($row['state_id']) . "'>" . htmlspecialchars($row['state_name']) . "</option>";
                }
           
        

        
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);
        
        $team_query= "INSERT INTO team (`name`,`email`,`phone`) values('".$name."','".$email."','".$phone."')";
        $result= mysqli_query($conn, $team_query);

            if ($result) {
                echo "New record created successfully";
            } else  {
                echo "Error";
            }
        }
    
    ?>
</body>
</html>    
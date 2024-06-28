<?php
include('link.php');
include('navbar.php');
include('db_connect.php');
$query = "SELECT * FROM contact";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="g-sidenav-show bg-gray-100">
<div style="padding-left: 190px; padding-top: 81px;" class="container">
        <h1>Contact</h1>
        </button>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">date</th>
                        <th scope="col">services</th>
                        <th scope="col">message</th>
      
                        <th scope="col">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['services'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        // Add action buttons or links here
                        echo "<td>
                        <div class='edit-delete'>
                        <a href='contact_edit.php?id=" . $row['id'] . "' class='edit-service' data-id='" . $row['id'] . "'><i class='fas fa-edit'></i></a>
                        <a href='#' class='delete-service' data-id='" . $row['id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
                        </div>
                        </td>";
    
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        

    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        // Wait for the document to be ready
      

        $('#addcontactservice').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(this); // Serialize form data

            $.ajax({
                url: 'addcontact.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    try {
                        var data = JSON.parse(response);
                        console.log(data);
                        $('#exampleModal').modal('hide');
                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });

        $('.delete-service').click(function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Get the ID of the service to be deleted
            var serviceId = $(this).data('id');

            // Send AJAX request to delete.php with the ID
            $.ajax({
                url: 'contact_delete.php',
                type: 'POST',
                data: { id: serviceId },
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    if (response.success) {
                        // Reload the page or update the table
                        location.reload("contact.php");
                    } else {
                        // Handle failure response
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX error
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>

</body>
</html>

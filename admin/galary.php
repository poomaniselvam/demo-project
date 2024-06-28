<?php
include('link.php');
include('navbar.php');
include('db_connect.php');
$query = "SELECT * FROM galary ORDER BY id desc ";
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
        <h1>Gallery</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Photos
        </button>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th> 
                        <th scope="col">Image</th> 
                        <th scope="col">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through each row of the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td><img src='uploads/" . $row['image'] . "' alt='Service Image' style='width: 100px;'></td>";
                        // Add action buttons or links here
                        echo "<td>
                        <div class='edit-delete'>
                        <a href='galary_edit.php?id=" . $row['id'] . "' class='edit-service' data-id='" . $row['id'] . "'><i class='fas fa-edit'></i></a>
                        <a href='#' class='delete-service' data-id='" . $row['id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
                        </div>
                        </td>";
                      
                    
                 
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!--  pop Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add galary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addgalleryform" enctype="multipart/form-data"> <!-- added enctype attribute -->
                         
                            <div class="form-group">
                                <label for="serviceName">Image</label>
                                <input type="file" class="form-control" id="icon" required name="image" >
                            </div>

                            <button style="margin-top:15px;" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        // Wait for the document to be ready
      

        $('#addgalleryform').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(this); // Serialize form data

            $.ajax({
                url: 'addgalary.php',
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
                url: 'galary_delete.php',
                type: 'POST',
                data: { id: serviceId },
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    if (response.success) {
                        // Reload the page or update the table
                        location.reload();
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Set container width to 400px */
            text-align: center; /* Center align content */
        }

        h2 {
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 50%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 12px;
            text-align: left;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginform" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div id="email-error" class="error-message"></div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <div id="password-error" class="error-message"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        jQuery.noConflict(); // Reverts `$` back to other JS libraries
        jQuery(document).ready(function($) { // Using `$` within the scope

            $('#loginform').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // AJAX call to submit the form data
                $.ajax({
                    url: 'login.php',
                    type: 'POST',
                    data: new FormData(this), // Serialize form data
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(data) {
                        window.location.href = 'service.php';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle error response
                    }
                });
            });

        });
    </script>
</body>
</html>

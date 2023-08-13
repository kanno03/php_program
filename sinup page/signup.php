
<?php
// Database credentials
$insert = false;
if(isset($_POST['name'])) {
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "test";
// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $databaseName);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the data submitted via form
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO `test`.`login` (`name`,`email`, `username`, `password`, `dt`) VALUES ('$name', '$email', '$username', '$password', current_timestamp());";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location: login.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F2F2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #FFF;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="email"], input[type="password"] ,input[type="username"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #FFF;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="login.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="username">username:</label>
            <input type="username" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <input type="submit" value="Register">

            <div class="error"></div>
        </form>
    </div>
</body>
</html>

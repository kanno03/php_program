<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "test";

$conn = mysqli_connect($servername, $username, $password, $databaseName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $un = $_POST['username'];
  $pw = $_POST['password'];

  $query = "SELECT * FROM login WHERE username='$un' AND password='$pw'";

  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // Successful login
    header("Location: datapage.html");
    exit();
  } else {
    // Invalid login
    $message = "Invalid username or password";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page </title>
  <link rel="stylesheet" href="./style.css">
  <style>
  <style>
@import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {
  background-image: url('img/background.jpg');
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  filter: blur(5px);
}

body {
  font-family: 'Lato', sans-serif;
  color: #4A4A4A;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

form {
  width: 350px;
  position: relative;
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}
form .form-field:nth-child(1)::before {
  background-image: url(img/user-icon.png);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(2)::before {
  background-image: url(img/lock-icon.png);
  width: 16px;
  height: 16px;
}
form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: #47AB11;
  color: #fff;
  border-radius: 4px;0
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
}
</style>
  </style>
</head>
<body>
  <div id="bg"></div>

  <form action="login.php" method="post">
    <div class="form-field">
      <input type="text" name="username" placeholder="Username or email" required/>
    </div>
    <div class="form-field">
      <input type="password" name="password" placeholder="Password" required/>
    </div>
    <div class="form-field">
      <button class="btn" type="submit">Log in</button>
    </div>
  </form>
</body>
</html>

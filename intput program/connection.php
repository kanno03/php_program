<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select database
if (!mysqli_select_db($conn, $dbname)) {
    die("Database selection failed: " . mysqli_error($conn));
}

// Fetch data from table
$data = array();
$result = mysqli_query($conn, "SELECT * FROM trip");
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
        'sno' => $row['sno'],
        'name' => $row['name'],
        'age' => $row['age'],
        'gender' => $row['gender'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'other' => $row['other'],
        'dt' => $row['dt']
    );
}

// Convert data to JSON and output
echo json_encode($data);

// Close connection
mysqli_close($conn);
?>

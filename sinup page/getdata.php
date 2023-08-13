<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product";

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
$result = mysqli_query($conn, "SELECT * FROM prtable");
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
        "Product_id" => $row['Product_id'],
        "Product_Name" => $row['Product_Name'],
        "Product_Quantity" => $row['Product_Quantity'],
        "Product_Price" => $row['Product_Price']
    );
}

// Convert data to JSON and output
echo json_encode($data);

// Close connection
mysqli_close($conn);
?>

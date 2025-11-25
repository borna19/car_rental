<?php
$servername = "localhost";   
$username   = "root";       
$password   = "";            
$database   = "car_rental";  

// ✅ Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// ✅ Check Connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>

<?php
$servername = "localhost";   
$username   = "root";       
$password   = "";            
$database   = "car_rental";  

// $servername = "sql205.infinityfree.com";   
// $username   = "if0_40911265";       
// $password   = "lNmQXgxmy9nb";            
// $database   = "if0_40911265_car_rental";

// ✅ Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// ✅ Check Connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>

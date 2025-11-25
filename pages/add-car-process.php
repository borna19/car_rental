<?php
include '../include/db.php';

// Get form values
$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
$fuel = $_POST['fuel'];
$transmission = $_POST['transmission'];
$seats = $_POST['seats'];
$image = $_POST['image'];

// Insert Query
$sql = "INSERT INTO cars (name, model, price, fuel, transmission, seats, image)
        VALUES ('$name', '$model', '$price', '$fuel', '$transmission', '$seats', '$image')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Car added successfully!');
            window.location.href='manage-cars.php';
          </script>";
} else {
    echo "<script>
            alert('Failed to add car!');
            window.location.href='manage-cars.php';
          </script>";
}
?>

<?php
include '../include/db.php';

$id = intval($_GET['id']);
$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE id='$id'"));

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $fuel = $_POST['fuel'];
    $transmission = $_POST['transmission'];
    $seats = $_POST['seats'];
    $status = $_POST['status'];
    $rating = $_POST['rating'];
    $tag = $_POST['tag'];
    $image = $_POST['image'];

    mysqli_query($conn, "UPDATE cars SET 
        name='$name',
        model='$model',
        price='$price',
        fuel='$fuel',
        transmission='$transmission',
        seats='$seats',
        status='$status',
        rating='$rating',
        tag='$tag',
        image='$image'
        WHERE id='$id'
    ");

    echo "<script>alert('Car updated successfully!'); window.location='cars.php';</script>";
}
?>

<form method="POST" class="container mt-4">
    <h3>Edit Car</h3>

    <input type="text" name="name" value="<?= $car['name'] ?>" class="form-control mb-2">
    <input type="text" name="model" value="<?= $car['model'] ?>" class="form-control mb-2">
    <input type="number" name="price" value="<?= $car['price'] ?>" class="form-control mb-2">
    <input type="text" name="fuel" value="<?= $car['fuel'] ?>" class="form-control mb-2">
    <input type="text" name="transmission" value="<?= $car['transmission'] ?>" class="form-control mb-2">
    <input type="number" name="seats" value="<?= $car['seats'] ?>" class="form-control mb-2">
    <input type="text" name="status" value="<?= $car['status'] ?>" class="form-control mb-2">
    <input type="text" name="rating" value="<?= $car['rating'] ?>" class="form-control mb-2">
    <input type="text" name="tag" value="<?= $car['tag'] ?>" class="form-control mb-2">
    <input type="text" name="image" value="<?= $car['image'] ?>" class="form-control mb-2">

    <button name="update" class="btn btn-primary mt-2">Update</button>
</form>

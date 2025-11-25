<?php
include '../include/header.php';
include '../include/db.php';

// Handle form submission
if(isset($_POST['book_car'])){
    $user_id = $_POST['user_id'];
    $car_id = $_POST['car_id'];
    $booking_date = $_POST['booking_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $total_price = $_POST['total_price'];
    
    $sql = "INSERT INTO bookings (user_id, car_id, booking_date, start_time, end_time, total_price) 
            VALUES ('$user_id', '$car_id', '$booking_date', '$start_time', '$end_time', '$total_price')";
    
    if(mysqli_query($conn, $sql)){
        $success = "Booking created successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Fetch bookings with user and car info
$bookings_sql = "SELECT b.*, u.name AS user_name, c.name AS car_name, c.model AS car_model 
                 FROM bookings b
                 JOIN users u ON b.user_id = u.id
                 JOIN cars c ON b.car_id = c.id
                 ORDER BY b.created_at DESC";
$bookings_result = mysqli_query($conn, $bookings_sql);

// Fetch users and cars for dropdown
$users_result = mysqli_query($conn, "SELECT id, name FROM users WHERE role='Customer'");
$cars_result = mysqli_query($conn, "SELECT id, name, model, price FROM cars WHERE status='available'");
?>

<div class="container mt-5">
    <h2 class="mb-4">Car Bookings</h2>

    <!-- Success / Error Messages -->
    <?php if(isset($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
    <?php if(isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

    <!-- Booking Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Booking</div>
        <div class="card-body">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label>User</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">Select User</option>
                            <?php while($user = mysqli_fetch_assoc($users_result)) { ?>
                                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Car</label>
                        <select name="car_id" class="form-control" required>
                            <option value="">Select Car</option>
                            <?php while($car = mysqli_fetch_assoc($cars_result)) { ?>
                                <option value="<?= $car['id'] ?>">
                                    <?= $car['name'] . " " . $car['model'] . " ($".$car['price'].")" ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Start Time</label>
                        <input type="datetime-local" name="start_time" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>End Time</label>
                        <input type="datetime-local" name="end_time" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Total Price</label>
                        <input type="number" name="total_price" class="form-control" required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" name="book_car" class="btn btn-primary" >Book Car</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="card">
        <div class="card-header">Existing Bookings</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Booking Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($booking = mysqli_fetch_assoc($bookings_result)) { ?>
                        <tr>
                            <td><?= $booking['id'] ?></td>
                            <td><?= $booking['user_name'] ?></td>
                            <td><?= $booking['car_name'] . " " . $booking['car_model'] ?></td>
                            <td><?= $booking['booking_date'] ?></td>
                            <td><?= $booking['start_time'] ?></td>
                            <td><?= $booking['end_time'] ?></td>
                            <td>$<?= $booking['total_price'] ?></td>
                            <td><?= $booking['status'] ?? 'pending' ?></td>
                            <td><?= $booking['created_at'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>

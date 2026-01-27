<?php
session_start();
include '../include/header.php';
include '../include/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$current_user_id = $_SESSION['user_id'];
$current_user_role = $_SESSION['role'] ?? '';

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
// If customer, only show their bookings
if ($current_user_role === 'customer') {
    $bookings_sql = "SELECT b.*, u.name AS user_name, c.name AS car_name, c.model AS car_model
                     FROM bookings b
                     JOIN users u ON b.user_id = u.id
                     JOIN cars c ON b.car_id = c.id
                     WHERE b.user_id = '$current_user_id'
                     ORDER BY b.created_at DESC";
} else {
    $bookings_sql = "SELECT b.*, u.name AS user_name, c.name AS car_name, c.model AS car_model
                     FROM bookings b
                     JOIN users u ON b.user_id = u.id
                     JOIN cars c ON b.car_id = c.id
                     ORDER BY b.created_at DESC";
}
$bookings_result = mysqli_query($conn, $bookings_sql);

// Fetch users and cars for dropdown
$users_result = mysqli_query($conn, "SELECT id, name FROM users WHERE role='Customer'");
$cars_result = mysqli_query($conn, "SELECT id, name, model, price FROM cars WHERE status='available' OR id='" . ($_GET['car_id'] ?? 0) . "'");

// Get pre-filled data from URL
$selected_car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '';
$selected_car_price = isset($_GET['price']) ? $_GET['price'] : '';

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
                        <?php if ($current_user_role === 'customer'): ?>
                            <input type="text" class="form-control" value="<?= $_SESSION['user_name'] ?>" readonly>
                            <input type="hidden" name="user_id" value="<?= $current_user_id ?>">
                        <?php else: ?>
                            <select name="user_id" class="form-control" required>
                                <option value="">Select User</option>
                                <?php while($user = mysqli_fetch_assoc($users_result)) { ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                                <?php } ?>
                            </select>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3">
                        <label>Car</label>
                        <select name="car_id" id="car_select" class="form-control" required onchange="updatePrice()">
                            <option value="" data-price="0">Select Car</option>
                            <?php while($car = mysqli_fetch_assoc($cars_result)) {
                                $selected = ($car['id'] == $selected_car_id) ? 'selected' : '';
                            ?>
                                <option value="<?= $car['id'] ?>" data-price="<?= $car['price'] ?>" <?= $selected ?>>
                                    <?= $car['name'] . " " . $car['model'] . " (₹".$car['price']."/day)" ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" required value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-2">
                        <label>Start Time</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="form-control" required onchange="calculateTotal()">
                    </div>
                    <div class="col-md-2">
                        <label>End Time</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="form-control" required onchange="calculateTotal()">
                    </div>
                    <div class="col-md-2">
                        <label>Total Price</label>
                        <input type="number" name="total_price" id="total_price" class="form-control" required readonly>
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
        <div class="card-header">My Bookings</div>
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
                            <td>₹<?= $booking['total_price'] ?></td>
                            <td><?= $booking['status'] ?? 'pending' ?></td>
                            <td><?= $booking['created_at'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function updatePrice() {
    calculateTotal();
}

function calculateTotal() {
    var carSelect = document.getElementById('car_select');
    var pricePerDay = carSelect.options[carSelect.selectedIndex].getAttribute('data-price');
    var startTime = document.getElementById('start_time').value;
    var endTime = document.getElementById('end_time').value;
    var totalPriceInput = document.getElementById('total_price');

    if (pricePerDay && startTime && endTime) {
        var start = new Date(startTime);
        var end = new Date(endTime);

        // Calculate difference in milliseconds
        var diff = end - start;

        // Convert to hours
        var diffHours = diff / (1000 * 60 * 60);

        if (diffHours > 0) {
            // Calculate price based on hours (assuming price is per day / 24 hours)
            // Or if price is strictly per day, we can use Math.ceil(diffHours / 24)

            // Let's assume daily rental, so any part of a day counts as a day or pro-rated
            // For simplicity, let's do pro-rated per hour based on daily rate
            // var total = (pricePerDay / 24) * diffHours;

            // Or simpler: calculate days
            var days = Math.ceil(diffHours / 24);
            var total = days * pricePerDay;

            totalPriceInput.value = Math.round(total);
        } else {
            totalPriceInput.value = 0;
        }
    } else {
        totalPriceInput.value = '';
    }
}
</script>

<?php include '../include/footer.php'; ?>

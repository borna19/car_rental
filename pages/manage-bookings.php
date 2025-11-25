<?php
include '../include/header.php';
include '../include/db.php';

/* ------------------------------
   DELETE BOOKING
--------------------------------*/
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM bookings WHERE id='$id'");
    echo "<script>alert('Booking deleted!'); window.location='manage-bookings.php';</script>";
}

/* ------------------------------
   UPDATE BOOKING STATUS
--------------------------------*/
if (isset($_GET['status']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status']; // confirmed, cancelled, completed, etc.

    mysqli_query($conn, "UPDATE bookings SET status='$status' WHERE id='$id'");
    echo "<script>alert('Status updated!'); window.location='manage-bookings.php';</script>";
}

/* ------------------------------
   FETCH ALL BOOKINGS
--------------------------------*/
$sql = "
    SELECT b.*,
           u.name AS user_name,
           c.name AS car_name,
           c.model AS car_model
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN cars c ON b.car_id = c.id
    ORDER BY b.id DESC
";

$result = mysqli_query($conn, $sql);
?>

<!-- Modern Styling -->
<style>
.card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.table th {
    background: #111827;
    color: white;
}

.badge-modern {
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.pending { background: #f0ad4e; color: #fff; }
.confirmed { background: #28a745; color: #fff; }
.cancelled { background: #dc3545; color: #fff; }
.completed { background: #0d6efd; color: #fff; }

.btn-sm {
    border-radius: 6px;
}
</style>

<div class="container mt-5">

    <h2 class="fw-bold mb-4">Manage Bookings</h2>

    <!-- BACK TO DASHBOARD BUTTON -->
    <a href="dashboard.php" class="btn btn-dark mb-3">← Back to Dashboard</a>


    <div class="card">
        <div class="card-header bg-white fw-bold" style="font-size: 18px;">
            All Bookings
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Booking Date</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td><?= $row['id']; ?></td>

                                <td><?= $row['user_name']; ?></td>

                                <td><?= $row['car_name'] . " " . $row['car_model']; ?></td>

                                <td><?= $row['booking_date']; ?></td>

                                <td><?= $row['start_time']; ?></td>

                                <td><?= $row['end_time']; ?></td>

                                <td><strong>₹<?= $row['total_price']; ?></strong></td>

                                <td>
                                    <span class="badge-modern <?= $row['status']; ?>">
                                        <?= ucfirst($row['status']); ?>
                                    </span>
                                </td>

                                <td>
                                    <a href="?status=confirmed&id=<?= $row['id']; ?>" 
                                       class="btn btn-success btn-sm mb-1">Confirm</a>

                                    <a href="?status=cancelled&id=<?= $row['id']; ?>" 
                                       class="btn btn-warning btn-sm mb-1">Cancel</a>

                                    <a href="?status=completed&id=<?= $row['id']; ?>" 
                                       class="btn btn-primary btn-sm mb-1">Complete</a>

                                    <a href="?delete=<?= $row['id']; ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this booking?')">Delete</a>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">No bookings found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?php include '../include/footer.php'; ?>

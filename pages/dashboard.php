<?php
session_start();

// ROLE CHECK
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header("Location: ../index.php");
    exit();
}

include '../include/header.php';
include '../include/db.php';

// --------------------------------------------
// DASHBOARD STAT COUNTS
// --------------------------------------------
$carCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM cars"))['total'];
$bookingCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"))['total'];
$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
?>

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- BOOTSTRAP ICONS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f4f6f9;
    }

    .dashboard-header {
        background: linear-gradient(90deg, #001f3f, #005f9e);
        padding: 45px 20px;
        color: white;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        text-align: center;
    }

    .dashboard-header h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-card {
        background: white;
        border-radius: 18px;
        padding: 25px 20px;
        text-align: center;
        transition: 0.3s;
        border: 1px solid #e5e7eb;
        cursor: pointer;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 25px rgba(0,0,0,0.15);
    }

    .stat-icon {
        font-size: 45px;
        margin-bottom: 12px;
        color: #0074D9;
    }

    .admin-menu-card {
        background: white;
        border-radius: 18px;
        padding: 30px;
        text-align: center;
        transition: 0.3s;
        border: 1px solid #e7e7e7;
        cursor: pointer;
    }

    .admin-menu-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transform: translateY(-8px);
    }

    .admin-menu-card i {
        font-size: 40px;
        margin-bottom: 10px;
        color: #0054c2;
    }

    a {
        text-decoration: none;
        color: inherit;
    }
</style>

<div class="dashboard-header">
    <h2>Admin Dashboard</h2>
    <p>Manage System • Analytics • Overview</p>
</div>

<div class="container py-5">

    <!-- TOP STATS -->
    <div class="row g-4 mb-4">

        <!-- Total Cars -->
        <div class="col-md-3">
            <a href="manage-cars.php">
                <div class="stat-card">
                    <i class="bi bi-car-front stat-icon"></i>
                    <h3 class="fw-bold"><?= $carCount ?></h3>
                    <p class="text-muted m-0">Total Cars</p>
                </div>
            </a>
        </div>

        <!-- Total Bookings -->
        <div class="col-md-3">
            <a href="manage-bookings.php">
                <div class="stat-card">
                    <i class="bi bi-calendar-check stat-icon"></i>
                    <h3 class="fw-bold"><?= $bookingCount ?></h3>
                    <p class="text-muted m-0">Total Bookings</p>
                </div>
            </a>
        </div>

        <!-- Registered Users -->
        <div class="col-md-3">
            <a href="manage-users.php">
                <div class="stat-card">
                    <i class="bi bi-people stat-icon"></i>
                    <h3 class="fw-bold"><?= $userCount ?></h3>
                    <p class="text-muted m-0">Registered Users</p>
                </div>
            </a>
        </div>

        <!-- Logout -->
        <div class="col-md-3">
            <a href="logout.php">
                <div class="stat-card">
                    <i class="bi bi-box-arrow-right stat-icon"></i>
                    <h3 class="fw-bold text-danger">Logout</h3>
                    <p class="text-muted m-0">Exit Admin Panel</p>
                </div>
            </a>
        </div>

    </div>

    <!-- MAIN MENU -->
    <div class="row g-4">

        <!-- Manage Cars -->
        <div class="col-md-3">
            <a href="manage-cars.php">
                <div class="admin-menu-card">
                    <i class="bi bi-car-front-fill"></i>
                    <h4 class="fw-bold">Manage Cars</h4>
                    <p class="text-muted m-0">Add • Edit • Delete</p>
                </div>
            </a>
        </div>

        <!-- Manage Bookings -->
        <div class="col-md-3">
            <a href="manage-bookings.php">
                <div class="admin-menu-card">
                    <i class="bi bi-clipboard-check"></i>
                    <h4 class="fw-bold">Bookings</h4>
                    <p class="text-muted m-0">View • Approve</p>
                </div>
            </a>
        </div>

        <!-- Manage Users -->
        <div class="col-md-3">
            <a href="manage-users.php">
                <div class="admin-menu-card">
                    <i class="bi bi-people-fill"></i>
                    <h4 class="fw-bold">Users</h4>
                    <p class="text-muted m-0">View Users</p>
                </div>
            </a>
        </div>

        <!-- Manage Feedback -->
        <div class="col-md-3">
            <a href="manage-feedback.php">
                <div class="admin-menu-card">
                    <i class="bi bi-chat-left-dots-fill"></i>
                    <h4 class="fw-bold">Feedback</h4>
                    <p class="text-muted m-0">User Feedback</p>
                </div>
            </a>
        </div>

    </div>

</div>

<?php include '../include/footer.php'; ?>

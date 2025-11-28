<?php
session_start();
// include '../include/header.php';
include '../include/db.php';

// ADMIN CHECK
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header("Location: ../index.php");
    exit();
}

// DELETE FEEDBACK
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    if (mysqli_query($conn, "DELETE FROM feedback WHERE id='$id'")) {
        $_SESSION['delete_msg'] = "Feedback deleted successfully!";
    } else {
        $_SESSION['delete_msg'] = "Error deleting feedback!";
    }

    header("Location: manage-feedback.php");
    exit();
}


// FETCH DATA
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM feedback WHERE 
        name LIKE '%$search%' 
        OR email LIKE '%$search%' 
        OR message LIKE '%$search%'
        ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
include '../include/header.php';
?>

<style>
.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #222;
}

.card-custom {
    border-radius: 14px;
    border: 1px solid #e4e7ec;
    background: #fff;
    padding: 25px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.05);
}

.table thead th {
    background: #f5f7fb;
    font-weight: 600;
}

.search-box {
    max-width: 350px;
}

.badge-rating {
    font-size: 0.9rem;
    padding: 6px 10px;
    border-radius: 6px;
}

.badge-rating.star-5 { background: #28a745; color: #fff; }
.badge-rating.star-4 { background: #17a2b8; color: #fff; }
.badge-rating.star-3 { background: #ffc107; color: #fff; }
.badge-rating.star-2 { background: #fd7e14; color: #fff; }
.badge-rating.star-1 { background: #dc3545; color: #fff; }
</style>

<div class="container py-4">

<?php if (isset($_SESSION['delete_msg'])) { ?>
    <div style="
        background: #28a745;
        color: #fff;
        padding: 12px;
        margin-bottom: 15px;
        text-align: center;
        border-radius: 6px;">
        <?php 
            echo $_SESSION['delete_msg']; 
            unset($_SESSION['delete_msg']); 
        ?>
    </div>
<?php } ?>

    <h2 class="page-title mb-4">Manage Feedback</h2>

    <div class="card-custom">

        <!-- SEARCH -->
        <form class="mb-3 d-flex justify-content-between">
            <input type="text" name="search" class="form-control search-box" placeholder="Search feedback..."
                   value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-primary ms-2">Search</button>
        </form>

        <!-- FEEDBACK TABLE -->
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ratingClass = "star-" . $row['rating'];
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo htmlspecialchars($row['name']); ?></td>

                        <td><?php echo htmlspecialchars($row['email']); ?></td>

                        <td>
                            <span class="badge-rating <?php echo $ratingClass; ?>">
                                ⭐ <?php echo $row['rating']; ?>/5
                            </span>
                        </td>

                        <td style="max-width: 320px;">
                            <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                        </td>

                        <td><?php echo $row['created_at']; ?></td>

                        <td>
                            <a href="manage-feedback.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this feedback?');">
                                Delete
                            </a>
                        </td>
                    </tr>

                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>No feedback found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>

<?php
include '../include/header.php';
include '../include/db.php';

/* ------------------------------
   DELETE USER
--------------------------------*/
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    echo "<script>alert('User deleted!'); window.location='manage-users.php';</script>";
}

/* ------------------------------
   UPDATE USER ROLE
--------------------------------*/
if (isset($_POST['update_role'])) {
    $id = intval($_POST['user_id']);
    $role = $_POST['role'];

    mysqli_query($conn, "UPDATE users SET role='$role' WHERE id='$id'");
    echo "<script>alert('Role updated!'); window.location='manage-users.php';</script>";
}

/* ------------------------------
   FETCH ALL USERS
--------------------------------*/
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>

<!-- Modern Styling -->
<style>
.card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.table th {
    background: #111827;
    color: white;
}

.role-badge {
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.Admin { background: #0d6efd; color: #fff; }
.Customer { background: #198754; color: #fff; }

.btn-sm { border-radius: 6px; }
</style>

<div class="container mt-5">

    <h2 class="fw-bold mb-4">Manage Users</h2>

    <a href="dashboard.php" class="btn btn-dark mb-3">← Back to Dashboard</a>

    <div class="card">
        <div class="card-header bg-white fw-bold" style="font-size: 18px;">
            All Registered Users
        </div>

        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registered At</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>

                                <td>
                                    <span class="role-badge <?= $row['role'] ?>">
                                        <?= $row['role'] ?>
                                    </span>
                                </td>

                                <td><?= $row['created_at'] ?></td>

                                <td>

                                    <!-- Edit Role Button -->
                                    <button class="btn btn-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#roleModal<?= $row['id'] ?>">
                                        Edit Role
                                    </button>

                                    <!-- Delete -->
                                    <a href="?delete=<?= $row['id'] ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this user?')">
                                       Delete
                                    </a>

                                </td>
                            </tr>

                            <!-- Role Update Modal -->
                            <div class="modal fade" id="roleModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?= $row['id'] ?>">

                                            <label class="fw-bold">Select Role:</label>
                                            <select name="role" class="form-control">
                                                <option value="Customer" <?= $row['role']=='Customer'?'selected':'' ?>>Customer</option>
                                                <option value="Admin" <?= $row['role']=='Admin'?'selected':'' ?>>Admin</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" name="update_role" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">No users found</td></tr>
                    <?php endif; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?php include '../include/footer.php'; ?>

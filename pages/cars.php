<?php
include '../include/header.php';
include '../include/db.php';

// DELETE CAR
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM cars WHERE id='$id'");
    echo "<script>alert('Car deleted successfully!'); window.location='cars.php';</script>";
}

// FETCH ALL CARS
$result = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");
?>

<div class="container mt-4">
    <h3 class="mb-3">Manage Cars</h3>

    <!-- Add Car Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCarModal" >
        + Add New Car
    </button>

    <div class="row">
        <?php while($car = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="<?= $car['image'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title"><?= $car['name'] ?></h5>
                        <p class="text-muted small"><?= $car['model'] ?> | <?= $car['fuel'] ?> | <?= $car['transmission'] ?></p>
                        <p><b>Price:</b> ₹<?= $car['price'] ?>/day</p>
                        <p><b>Seats:</b> <?= $car['seats'] ?></p>
                        <p><b>Status:</b> <?= $car['status'] ?></p>
                        <p><b>Rating:</b> ⭐ <?= $car['rating'] ?></p>

                        <!-- Action Buttons -->
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $car['id'] ?>">
                            Edit
                        </button>

                        <a href="cars.php?delete=<?= $car['id'] ?>" 
                           onclick="return confirm('Delete this car?')"
                           class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal<?= $car['id'] ?>" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">

                  <form method="POST" action="update-car.php?id=<?= $car['id'] ?>">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit <?= $car['name'] ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

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

                    </div>

                    <div class="modal-footer">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>

        <?php endwhile; ?>
    </div>
</div>

<!-- Add Car Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="insert-car.php">
        <div class="modal-header">
          <h5 class="modal-title">Add New Car</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="text" name="name" class="form-control mb-2" placeholder="Car Name" required>
          <input type="text" name="model" class="form-control mb-2" placeholder="Model" required>
          <input type="number" name="price" class="form-control mb-2" placeholder="Price per day" required>
          <input type="text" name="fuel" class="form-control mb-2" placeholder="Fuel Type" required>
          <input type="text" name="transmission" class="form-control mb-2" placeholder="Transmission" required>
          <input type="number" name="seats" class="form-control mb-2" placeholder="Seats" required>
          <input type="text" name="status" class="form-control mb-2" placeholder="Status" required>
          <input type="text" name="rating" class="form-control mb-2" placeholder="Rating" required>
          <input type="text" name="tag" class="form-control mb-2" placeholder="Tag">
          <input type="text" name="image" class="form-control mb-2" placeholder="Image URL" required>
        </div>

        <div class="modal-footer">
          <button type="submit" name="save" class="btn btn-success">Add Car</button>
        </div>

      </form>

    </div>
  </div>
</div>

<?php include '../include/footer.php'; ?>

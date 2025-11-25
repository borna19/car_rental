<?php
include '../include/header.php';
include '../include/db.php';

// --------- DELETE CAR ---------
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM cars WHERE id='$id'");
    echo "<script>alert('Car deleted successfully!'); window.location='cars.php';</script>";
}
?>

<style>
.car-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}
.car-card {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    transition: 0.3s;
}
.car-card:hover {
    box-shadow: 0 0 10px #ddd;
}
</style>

<div class="container py-4">

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold m-0">Manage Cars</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCarModal">+ Add Car</button>

    </div>

    <div class="row g-4">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");

        if (mysqli_num_rows($sql) == 0) {
            echo "<p class='text-center'>No cars found!</p>";
        }

        while ($row = mysqli_fetch_assoc($sql)) {
        ?>
        <div class="col-md-4">
            <div class="car-card">

                <!-- Car Image -->
                <img src="<?php echo $row['image']; ?>" 
     class="img-fluid rounded" 
     style="height:200px; object-fit:cover;" 
     alt="Car Image">



                <!-- Car Details -->
                <h5 class="mt-2"><?php echo $row['name']; ?></h5>
                <p class="text-muted m-0">₹ <?php echo number_format($row['price']); ?> / day</p>

                <!-- Action Buttons -->
                <div class="mt-3 d-flex justify-content-between">
                    <a href="edit-car.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                    <a href="cars.php?delete=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Delete this car?')" 
                       class="btn btn-sm btn-danger">Delete</a>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include '../include/footer.php'; ?>


<!-- ADD CAR MODAL -->
<div class="modal fade" id="addCarModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title fw-bold">Add New Car</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="add-car-process.php" method="POST">
        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Car Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Car Model</label>
            <input type="number" name="model" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Price / Day</label>
            <input type="number" name="price" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Fuel Type</label>
            <select name="fuel" class="form-control" required>
              <option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
              <option value="Electric">Electric</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Transmission</label>
            <select name="transmission" class="form-control" required>
              <option value="Manual">Manual</option>
              <option value="Automatic">Automatic</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Seats</label>
            <input type="number" name="seats" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Car Image URL</label>
            <input type="text" name="image" class="form-control" placeholder="Paste image URL" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Car</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </form>

    </div>
  </div>
</div>


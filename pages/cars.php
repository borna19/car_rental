<?php

include '../include/db.php';
// ADD NEW CAR
// =========================
if (isset($_POST['save'])) {

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

    $query = "INSERT INTO cars (name, model, price, fuel, transmission, seats, status, rating, tag, image)
              VALUES ('$name', '$model', '$price', '$fuel', '$transmission', '$seats', '$status', '$rating', '$tag', '$image')";

    if (mysqli_query($conn, $query)) {
        header("Location: cars.php?added=1");
        exit();
    } else {
        header("Location: cars.php?added=0");
        exit();
    }
}


// DELETE CAR
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM cars WHERE id='$id'");
    echo "<script>alert('Car deleted successfully!'); window.location='cars.php';</script>";
    exit();
}

// UPDATE CAR
if (isset($_POST['update'])) {
    $id = $_POST['id'];
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

    $query = "UPDATE cars SET 
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
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: cars.php?updated=1");
        exit();
    } else {
        header("Location: cars.php?updated=0");
        exit();
    }
}



// FETCH ALL CARS
$result = mysqli_query($conn, "SELECT * FROM cars ORDER BY id DESC");
include '../include/header.php';
?>

<div class="container mt-4">
    <h3 class="mb-3">Manage Cars</h3>
    <?php if(isset($_GET['added']) && $_GET['added'] == 1): ?>
        <div class="alert alert-success">New car added successfully!</div>
    <?php endif; ?>

    <?php if(isset($_GET['added']) && $_GET['added'] == 0): ?>
        <div class="alert alert-danger">Failed to add new car!</div>
    <?php endif; ?>

    <?php if(isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Car updated successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['updated']) && $_GET['updated'] == 0): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Update failed! Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

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

                  <form method="POST" action="cars.php">
                    <input type="hidden" name="id" value="<?= $car['id'] ?>">
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

      <form method="POST" action="cars.php">
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

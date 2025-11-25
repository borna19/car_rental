<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include __DIR__ . '/db.php'; // FIXED PATH
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarRental | <?= ucfirst(str_replace(".php", "", $current_page)); ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      padding-top: 70px;
    }

    .navbar {
      background: linear-gradient(90deg, #001f3f, #0074D9);
      padding: 12px 0;
    }

    .modal-content {
      border-radius: 15px;
      border: none;
    }

    .form-control {
      border-radius: 10px;
    }
  </style>
</head>

<body>

  <?php
  // Display success/error messages
  if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger text-center mb-0">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success text-center mb-0">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
  }
  ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php" style="font-size: 1.6rem;">
        🚗 <span class="ms-2 text-warning">Car<span class="text-white">Rental</span></span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">

          <li class="nav-item"><a class="nav-link text-white fw-semibold mx-2" href="/car_rental/index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold mx-2" href="/car_rental/pages/about.php">About</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold mx-2" href="/car_rental/pages/cars.php">Cars</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold mx-2" href="/car_rental/pages/bookings.php">Bookings</a></li>
          <li class="nav-item"><a class="nav-link text-white fw-semibold mx-2" href="/car_rental/pages/contact.php">Contact</a></li>


          <?php if (isset($_SESSION['user_id'])): ?>

            <?php if ($_SESSION['role'] === 'Admin'): ?>
              <li class="nav-item">
                <a class="nav-link text-warning fw-bold mx-2" href="/car_rental/pages/dashboard.php">
                  Admin Panel
                </a>
              </li>
            <?php endif; ?>


            <li class="nav-item">
              <span class="text-white fw-semibold mx-2">
                Hi, <?= htmlspecialchars($_SESSION['user_name']); ?> 👋
              </span>
            </li>

            <li class="nav-item">
              <a href="/car_rental/pages/logout.php"
                class="btn btn-outline-light btn-sm px-3 ms-2"
                style="border-radius: 30px;">Logout</a>
            </li>

          <?php else: ?>

            <li class="nav-item ms-3">
              <button class="btn btn-outline-light btn-sm px-3 me-2"
                style="border-radius: 30px;"
                data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            </li>

            <li class="nav-item">
              <button class="btn btn-warning btn-sm px-3 fw-bold"
                style="border-radius: 30px;"
                data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
            </li>

          <?php endif; ?>

        </ul>

      </div>
    </div>
  </nav>

  <!-- ✅ Modern Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content"
        style="border-radius: 20px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.3); border: none;">

        <!-- Header -->
        <div class="modal-header"
          style="background: linear-gradient(90deg, #001f3f, #0074D9); color: white; border: none;">
          <h5 class="modal-title fw-bold" id="loginModalLabel" style="font-size: 1.2rem;">Login to CarRental</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <!-- Body -->
        <div class="modal-body px-4 py-4" style="background-color: #f9fafc;">
          <form method="POST" action="pages/login.php">

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label fw-semibold" style="color: #001f3f;">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required
                style="border-radius: 12px; padding: 10px 14px; border: 1px solid #ccc; transition: 0.3s;">
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label class="form-label fw-semibold" style="color: #001f3f;">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter your password" required
                style="border-radius: 12px; padding: 10px 14px; border: 1px solid #ccc; transition: 0.3s;">
            </div>

            <!-- Remember + Forgot -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe" style="cursor:pointer;">
                <label class="form-check-label" for="rememberMe" style="font-size: 0.9rem;">Remember me</label>
              </div>
              <a href="#" style="text-decoration: none; color: #0074D9; font-weight: 500;">Forgot Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" name="login"
              style="background: linear-gradient(90deg, #0074D9, #001f3f); 
                         border: none; 
                         color: white; 
                         font-weight: 600; 
                         width: 100%; 
                         padding: 10px; 
                         border-radius: 30px; 
                         transition: 0.3s;">
              Login
            </button>
          </form>
        </div>

        <!-- Footer -->
        <div class="modal-footer text-center" style="border: none; background: #f9fafc;">
          <p class="mb-0" style="width:100%; font-size: 0.95rem;">
            Don’t have an account?
            <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal"
              style="color: #0074D9; font-weight: 600; text-decoration: none;">Register now</a>
          </p>
        </div>
      </div>
    </div>
  </div>


  <!-- ✅ Register Modal (Modern Inline Design) -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content"
        style="border-radius: 20px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.2); border: none; transition: all 0.3s ease;">

        <!-- Header -->
        <div class="modal-header"
          style="background: linear-gradient(90deg, #ffcc00, #ffb700); color: #222; border: none;">
          <h5 class="modal-title fw-bold" id="registerModalLabel"
            style="font-size: 1.3rem; letter-spacing: 0.5px;">
            ✨ Create an Account
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            style="filter: brightness(0) invert(0.2);"></button>
        </div>

        <!-- Body -->
        <div class="modal-body" style="padding: 2rem;">
          <form method="POST" action="pages/register.php">

            <!-- Name -->
            <div class="mb-3">
              <label class="form-label fw-semibold" style="color: #333;">Full Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter your full name" required
                style="border-radius: 10px; border: 1px solid #ddd; padding: 10px 12px; box-shadow: none; transition: all 0.2s ease;">
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label fw-semibold" style="color: #333;">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" required
                style="border-radius: 10px; border: 1px solid #ddd; padding: 10px 12px; box-shadow: none; transition: all 0.2s ease;">
            </div>

            <!-- Password -->
            <div class="mb-4">
              <label class="form-label fw-semibold" style="color: #333;">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter a strong password" required
                style="border-radius: 10px; border: 1px solid #ddd; padding: 10px 12px; box-shadow: none; transition: all 0.2s ease;">
            </div>

            <!-- Submit -->
            <button type="submit" name="register"
              class="btn w-100 fw-bold"
              style="background: linear-gradient(90deg, #ffcc00, #ffaa00); border: none; border-radius: 50px; padding: 10px 0; color: #000; font-size: 1.05rem; letter-spacing: 0.5px; transition: all 0.3s ease;">
              Register
            </button>
          </form>
        </div>

        <!-- Footer -->
        <div class="modal-footer" style="border: none; text-align: center; justify-content: center; background-color: #f9f9f9;">
          <p class="mb-0" style="font-size: 0.95rem; color: #555;">
            Already have an account?
            <a href="#" class="fw-semibold"
              style="color: #0d6efd; text-decoration: none;"
              data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
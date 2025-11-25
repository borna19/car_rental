<?php
  include 'include/header.php';
  include 'include/db.php';
?>

<!-- ✅ Registration Success Message -->
<?php if (isset($_GET['register']) && $_GET['register'] === 'success'): ?>
  <div class="alert alert-success alert-dismissible fade show text-center mb-0" role="alert">
    Registration successful! You can now log in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- ✅ Hero Section with Background Carousel -->
<section class="position-relative text-white text-center d-flex align-items-center justify-content-center" 
         style="height:100vh; overflow:hidden;">

  <!-- 🔹 Background Carousel -->
  <div id="heroCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="assets/images/hero_car1.jpg" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Car 1">
      </div>

      <div class="carousel-item">
        <img src="assets/images/hero_car2.jpg" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Car 2">
      </div>

      <div class="carousel-item">
        <img src="assets/images/hero_car3.jpg" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(60%);" alt="Car 3">
      </div>

    </div>
  </div>

  <!-- 🔹 Overlay Text -->
  <div class="container position-relative" style="z-index:2;">
    <h1 class="display-4 fw-bold mb-3">Drive Your Dream Car Today 🚘</h1>
    <p class="lead mb-4">Affordable, reliable, and stylish cars for every occasion.</p>
    <a href="pages/cars.php" class="btn btn-warning btn-lg px-4 py-2 fw-semibold rounded-pill me-2">Book Now</a>
    <a href="pages/about.php" class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill">Learn More</a>
  </div>

  <!-- 🔹 Dark Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 31, 63, 0.6); z-index:1;"></div>
</section>


<!-- ✅ Featured Cars Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="fw-bold mb-4 text-dark">🚗 Featured Cars</h2>
    <p class="text-muted mb-5">Choose from our most popular car models available for rent.</p>

    <div class="row g-4">

      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="assets/images/car1.jpg" class="card-img-top" alt="Car 1">
          <div class="card-body">
            <h5 class="card-title fw-bold">BMW 3 Series</h5>
            <p class="text-muted">Luxury Sedan • Automatic</p>
            <p class="fw-semibold text-primary">$75 / day</p>
            <a href="pages/bookings.php" class="btn btn-outline-primary btn-sm rounded-pill">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="assets/images/car2.jpg" class="card-img-top" alt="Car 2">
          <div class="card-body">
            <h5 class="card-title fw-bold">Audi Q7</h5>
            <p class="text-muted">SUV • Automatic</p>
            <p class="fw-semibold text-primary">$90 / day</p>
            <a href="pages/bookings.php" class="btn btn-outline-primary btn-sm rounded-pill">Book Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
          <img src="assets/images/car3.jpg" class="card-img-top" alt="Car 3">
          <div class="card-body">
            <h5 class="card-title fw-bold">Toyota Camry</h5>
            <p class="text-muted">Comfort Sedan • Manual</p>
            <p class="fw-semibold text-primary">$50 / day</p>
            <a href="pages/bookings.php" class="btn btn-outline-primary btn-sm rounded-pill">Book Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ✅ Why Choose Us Section -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #0074D9, #001f3f); color: white;">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Choose CarRental?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4">
          <h4>🕒 24/7 Availability</h4>
          <p>Book and pick up your car anytime with our round-the-clock service.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4">
          <h4>💸 Affordable Rates</h4>
          <p>Get premium cars at prices that don’t hurt your wallet.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4">
          <h4>🚗 Well-Maintained Cars</h4>
          <p>Every car is thoroughly checked and sanitized before delivery.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ✅ Testimonials Section -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="fw-bold mb-4 text-dark">💬 What Our Customers Say</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <p>"Amazing experience! The booking process was smooth and the car was spotless."</p>
            <h6 class="fw-bold text-primary mt-3">- Alex Johnson</h6>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <p>"Affordable rates and excellent customer service. Highly recommended!"</p>
            <h6 class="fw-bold text-primary mt-3">- Priya Sharma</h6>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <p>"I rented an Audi for my trip — it was in perfect condition. Loved it!"</p>
            <h6 class="fw-bold text-primary mt-3">- David Miller</h6>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>




<!-- ==================== SERVICE CATEGORIES (MODERN) ==================== -->
<section class="py-5" style="background: #f5f7fa;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4" style="font-size: 2rem;">Choose Your Rental Style</h2>

    <div class="row g-4 justify-content-center">

      <!-- CARD -->
      <div class="col-md-4">
        <div class="modern-card text-center p-4">
          <div class="icon-box mb-3">
            <img src="assets/images/car-rental.png" width="55">
          </div>
          <h5 class="fw-bold">Self-Drive Rentals</h5>
          <p class="text-muted">Enjoy complete freedom with our self-drive cars.</p>
        </div>
      </div>

      <!-- CARD -->
      <div class="col-md-4">
        <div class="modern-card text-center p-4">
          <div class="icon-box mb-3">
            <img src="assets/images/cha.png" width="55">
          </div>
          <h5 class="fw-bold">Chauffeur Driven</h5>
          <p class="text-muted">Sit back and relax while we drive for you.</p>
        </div>
      </div>

      <!-- CARD -->
      <div class="col-md-4">
        <div class="modern-card text-center p-4">
          <div class="icon-box mb-3">
            <img src="assets/images/longterm.png" width="55">
          </div>
          <h5 class="fw-bold">Long-Term Rentals</h5>
          <p class="text-muted">Affordable packages for monthly car rentals.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Modern Card CSS -->
<style>
  .modern-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    border: 1px solid #e5e5e5;
  }

  .modern-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
  }

  .icon-box {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #eef3ff, #d6e1ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    box-shadow: 0 4px 12px rgba(100, 120, 255, 0.2);
  }

  .modern-card h5 {
    font-weight: 700;
    margin-top: 10px;
  }

  .modern-card p {
    font-size: 0.95rem;
  }
</style>



<!-- ==================== OFFER & DISCOUNT (MODERN ELEGANT CLEAN) ==================== -->
<section class="py-5" style="background:#f8f9fc;">
  <div class="container">
    <h2 class="text-center fw-bold mb-5" style="font-size: 2rem;">Exclusive Deals & Offers</h2>

    <div class="row g-4">

      <!-- CARD -->
      <div class="col-md-4">
        <div class="offer-card p-4 text-center border-gradient-blue">
          <h3 class="fw-bold text-primary mb-1">10% OFF</h3>
          <p class="text-muted mb-0">On All Weekend Rentals</p>
        </div>
      </div>

      <!-- CARD -->
      <div class="col-md-4">
        <div class="offer-card p-4 text-center border-gradient-green">
          <h3 class="fw-bold text-success mb-1">15% OFF</h3>
          <p class="text-muted mb-0">First Booking Special Discount</p>
        </div>
      </div>

      <!-- CARD -->
      <div class="col-md-4">
        <div class="offer-card p-4 text-center border-gradient-yellow">
          <h3 class="fw-bold text-warning mb-1">Flat ₹2000 OFF</h3>
          <p class="text-muted mb-0">On Monthly Rentals</p>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  .offer-card {
    background: #ffffff;
    border-radius: 18px;
    border: 3px solid transparent;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    transition: all 0.3s ease;
  }

  .offer-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
  }

  /* Gradient Border Styles */
  .border-gradient-blue {
    border-image: linear-gradient(45deg, #4e73df, #4aa3ff) 1;
  }

  .border-gradient-green {
    border-image: linear-gradient(45deg, #1cc88a, #4dd68c) 1;
  }

  .border-gradient-yellow {
    border-image: linear-gradient(45deg, #f6c23e, #ffde59) 1;
  }

  .offer-card h3 {
    font-size: 1.7rem;
    letter-spacing: 1px;
  }

  .offer-card p {
    font-size: 0.95rem;
  }
</style>



<!-- ==================== POPULAR LOCATIONS (KOLKATA - MODERN ELEGANT) ==================== -->
<section class="py-5" style="background:#f8f9fc;">
  <div class="container">
    <h2 class="text-center fw-bold mb-5" style="font-size: 2rem;">Available in These Kolkata Locations</h2>

    <div class="row g-4 justify-content-center">

      <!-- Location Item -->
      <div class="col-md-3">
        <div class="location-card">
          <i class="bi bi-geo-alt-fill text-primary fs-3 mb-2"></i>
          <h5 class="fw-bold mb-0">Park Street</h5>
        </div>
      </div>

      <!-- Location Item -->
      <div class="col-md-3">
        <div class="location-card">
          <i class="bi bi-geo-alt-fill text-success fs-3 mb-2"></i>
          <h5 class="fw-bold mb-0">Salt Lake Sector V</h5>
        </div>
      </div>

      <!-- Location Item -->
      <div class="col-md-3">
        <div class="location-card">
          <i class="bi bi-geo-alt-fill text-warning fs-3 mb-2"></i>
          <h5 class="fw-bold mb-0">New Town</h5>
        </div>
      </div>

      <!-- Location Item -->
      <div class="col-md-3">
        <div class="location-card">
          <i class="bi bi-geo-alt-fill text-danger fs-3 mb-2"></i>
          <h5 class="fw-bold mb-0">Howrah</h5>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  .location-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 28px 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    text-align: center;
    border: 2px solid transparent;
    transition: all 0.3s ease;
  }

  .location-card:hover {
    transform: translateY(-8px);
    border-color: transparent;
    box-shadow: 0 14px 32px rgba(0, 0, 0, 0.12);
    background-image: linear-gradient(white, white),
                      linear-gradient(45deg, #4e73df, #1cc88a, #f6c23e);
    background-origin: border-box;
    background-clip: content-box, border-box;
  }

  .location-card h5 {
    font-size: 1.1rem;
    letter-spacing: 0.3px;
  }
</style>



<!-- ==================== ACHIEVEMENTS ==================== -->
<section class="py-5" style="background:#f5f7fa;">
  <div class="container">

    <h2 class="text-center fw-bold mb-5" style="font-size:2rem; letter-spacing:0.5px;">
      Our Milestones
    </h2>

    <div class="row text-center g-4">

      <div class="col-md-3">
        <div class="milestone-card">
          <h3 class="number">300+</h3>
          <p class="label">Cars Available</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="milestone-card">
          <h3 class="number">10,000+</h3>
          <p class="label">Happy Customers</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="milestone-card">
          <h3 class="number">4.9/5</h3>
          <p class="label">Average Rating</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="milestone-card">
          <h3 class="number">5+ Years</h3>
          <p class="label">Service Experience</p>
        </div>
      </div>

    </div>

  </div>
</section>

<style>
.milestone-card {
  background: #ffffff;
  padding: 30px 20px;
  border-radius: 16px;
  transition: all 0.3s ease;
  border: 1px solid #e8ecf2;
  box-shadow: 0px 4px 12px rgba(0,0,0,0.05);
}

.milestone-card:hover {
  transform: translateY(-5px);
  box-shadow: 0px 6px 20px rgba(0,0,0,0.08);
}

.milestone-card .number {
  font-size: 2rem;
  font-weight: 700;
  color: #1a2a3a;
  margin-bottom: 8px;
}

.milestone-card .label {
  font-size: 0.95rem;
  color: #6c7a89;
  margin: 0;
}
</style>



<!-- ==================== PARTNER BRANDS (SIMPLE & MODERN) ==================== -->
<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Our Trusted Partners</h2>

    <div class="row text-center g-4 justify-content-center">

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/toyota.jpg" class="simple-logo">
          <p class="simple-name">Toyota</p>
        </div>
      </div>

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/hundai.jpg" class="simple-logo">
          <p class="simple-name">Hyundai</p>
        </div>
      </div>

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/honda.jpg" class="simple-logo">
          <p class="simple-name">Honda</p>
        </div>
      </div>

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/bmw.jpg" class="simple-logo">
          <p class="simple-name">BMW</p>
        </div>
      </div>

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/audi.jpg" class="simple-logo">
          <p class="simple-name">Audi</p>
        </div>
      </div>

      <div class="col-md-2 col-6">
        <div class="simple-brand">
          <img src="assets/images/suzuki.jpg" class="simple-logo">
          <p class="simple-name">Suzuki</p>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
.simple-brand {
  background: #ffffff;
  padding: 18px 10px;
  border-radius: 12px;
  border: 1px solid #e6e9ee;
  transition: 0.3s ease;
}

.simple-brand:hover {
  border-color: #4a6cf7;
  transform: translateY(-4px);
}

/* Logo */
.simple-logo {
  max-height: 55px;
  margin-bottom: 6px;
  opacity: 0.8;
  transition: 0.3s ease;
}

.simple-brand:hover .simple-logo {
  opacity: 1;
}

/* Name */
.simple-name {
  margin: 0;
  font-size: 0.9rem;
  font-weight: 600;
  color: #2d3a4b;
  transition: 0.3s ease;
}

.simple-brand:hover .simple-name {
  color: #4a6cf7;
}
</style>







<?php include 'include/footer.php'; ?>

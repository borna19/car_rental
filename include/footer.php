<!-- Elegant Footer Section -->
<footer class="text-white mt-5 pt-5 pb-3" 
        style="background: linear-gradient(90deg, #001f3f, #0074D9); border-top: 3px solid #ffc107;">
  <div class="container">
    <div class="row text-center text-md-start">

      <!-- Brand & Description -->
      <div class="col-md-4 mb-4">
        <h4 class="fw-bold text-warning">🚗 Car<span class="text-white">Rental</span></h4>
        <p style="font-size: 15px; color: #ddd;">
          Your trusted partner for reliable, affordable, and luxury car rentals. 
          Travel smart and in style — anytime, anywhere.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold text-warning mb-3">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white text-decoration-none d-block mb-2">🏠 Home</a></li>
          <li><a href="pages/about.php" class="text-white text-decoration-none d-block mb-2">ℹ️ About Us</a></li>
          <li><a href="pages/cars.php" class="text-white text-decoration-none d-block mb-2">🚘 Cars</a></li>
          <li><a href="pages/bookings.php" class="text-white text-decoration-none d-block mb-2">📅 Bookings</a></li>
          <li><a href="pages/contact.php" class="text-white text-decoration-none d-block">📞 Contact</a></li>
        </ul>
      </div>

      <!-- Contact & Socials -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold text-warning mb-3">Get in Touch</h5>
        <p style="color: #ddd; font-size: 15px;">📍 123 Main Street, Kolkata, India</p>
        <p style="color: #ddd; font-size: 15px;">📞 +91 98765 43210</p>
        <p style="color: #ddd; font-size: 15px;">✉️ support@carrental.com</p>

        <!-- Social Icons -->
        <div class="mt-3">
          <a href="#" class="text-warning me-3"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="text-warning me-3"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="text-warning me-3"><i class="bi bi-twitter fs-4"></i></a>
          <a href="#" class="text-warning"><i class="bi bi-youtube fs-4"></i></a>
        </div>
      </div>
    </div>

    <hr class="border-light">

    <!-- Bottom Footer -->
    <div class="text-center">
      <p class="mb-0" style="font-size: 14px; color: #ccc;">
        © <?php echo date("Y"); ?> <span class="text-warning fw-bold">CarRental</span>. All rights reserved.
        | Designed with ❤️ by Barnali
      </p>
    </div>
  </div>
</footer>
<!-- ✅ Back to Top Button -->
<button id="backToTopBtn" 
        style="display:none; position:fixed; bottom:20px; right:25px; 
               z-index:99; background-color:#ffc107; color:#001f3f; 
               border:none; outline:none; font-size:20px; 
               padding:10px 15px; border-radius:50%; 
               cursor:pointer; box-shadow:0 4px 8px rgba(0,0,0,0.3); 
               transition:all 0.3s ease;">
  ↑
</button>

<script>
// 🔹 Show button when user scrolls down
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  const btn = document.getElementById("backToTopBtn");
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
}

// 🔹 Scroll to top smoothly
document.getElementById("backToTopBtn").addEventListener("click", function() {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
</script>


<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

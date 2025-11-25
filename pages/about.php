<?php
include '../include/header.php';
?>

<!-- ====================== HERO BANNER ====================== -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #001f3f, #0056b3);">
    <div class="container text-center">
        <h1 class="display-5 fw-bold">About Our Car Rental Service</h1>
        <p class="lead mt-3">
            A modern and reliable car rental platform built for easy, fast, and smart travel solutions.
        </p>
    </div>
</section>

<!-- ====================== VIDEO BANNER ====================== -->
<section class="position-relative" style="height:380px; overflow:hidden;">

    <!-- YouTube Background Video -->
    <iframe
        src="https://www.youtube.com/embed/qqFy1SnwkNI?autoplay=1&mute=1&controls=0&loop=1&playlist=qqFy1SnwkNI&modestbranding=1&showinfo=0"
        style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; pointer-events:none;"
        frameborder="0"
        allow="autoplay"
        allowfullscreen>
    </iframe>

    <!-- Dark Overlay -->
    <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.4);"></div>

    <!-- Text Content -->
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
        <h1 class="fw-bold display-5">Welcome to Car Rental</h1>
        <p class="lead">Book your perfect ride today</p>
        <a href="cars.php" class="btn btn-warning px-4 py-2 mt-2">Book Now</a>
    </div>

</section>


<!-- ====================== WHO WE ARE ====================== -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Image -->
            <div class="col-md-5 mb-4">
                <div class="position-relative">
                    <img src="../assets/images/about.jpg"
                         class="img-fluid rounded-4 shadow-lg"
                         style="border-radius: 20px; object-fit: cover;">
                    
                    <!-- Gradient Overlay -->
                    <div style="
                        position:absolute; 
                        top:0; left:0; width:100%; height:100%; 
                        border-radius:20px;
                        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
                    "></div>
                </div>
            </div>

            <!-- Right Text -->
            <div class="col-md-7">
                <h2 class="fw-bold mb-3" style="font-size: 2.4rem;">
                    Who We Are
                </h2>

                <p class="text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                    We are a trusted car rental platform offering a wide range of vehicles designed
                    to match your travel style — from luxurious sedans to family SUVs. Our focus is
                    on providing comfort, reliability, and a seamless rental experience.
                </p>

                <p class="text-muted" style="font-size: 1.05rem; line-height: 1.8;">
                    Our mission is simple — make car renting effortless, transparent, and affordable
                    for everyone. With easy booking, flexible pricing, and customer-first support,
                    we ensure your journey starts with confidence.
                </p>

                <!-- Highlight Points -->
                <ul class="list-unstyled mt-4">
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i>
                        24/7 Customer Support
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i>
                        Wide Range of Cars for Every Budget
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-warning me-2"></i>
                        Easy Online Booking & Flexible Pricing
                    </li>
                </ul>

                <!-- Button -->
                <a href="about.php" class="btn btn-warning px-4 py-2 rounded-3 mt-3 shadow-sm">
                    Learn More
                </a>

            </div>
        </div>
    </div>
</section>


<!-- ====================== WHAT WE OFFER ====================== -->
<section class="py-5" style="background: #f2f4f7;">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" style="font-size: 2rem;">What We Offer</h2>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="offer-card text-white p-4 rounded-4 shadow-sm h-100 text-center"
                     style="background: linear-gradient(135deg, #0066ff, #5596ff);">

                    <!-- CUSTOM ICON IMAGE -->
                    <img src="../assets/images/car-wash.png" width="60" class="mb-3" alt="Car Icon">

                    <h5 class="fw-bold">Wide Range of Cars</h5>
                    <p class="opacity-75">
                        Choose from economy, premium & luxury vehicles.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="offer-card text-dark p-4 rounded-4 shadow-sm h-100 text-center"
                     style="background: linear-gradient(135deg, #ffffff, #f7f7f7);">

                    <!-- CUSTOM ICON IMAGE -->
                    <img src="../assets/images/booking.png" width="60" class="mb-3" alt="Booking Icon">

                    <h5 class="fw-bold">Easy Online Booking</h5>
                    <p class="text-muted">
                        Book your ride in seconds with fast processing.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="offer-card text-white p-4 rounded-4 shadow-sm h-100 text-center"
                     style="background: linear-gradient(135deg, #333333, #555555);">

                    <!-- CUSTOM ICON IMAGE -->
                    <img src="../assets/images/secure.png" width="60" class="mb-3" alt="Secure Icon">

                    <h5 class="fw-bold">Secure & Reliable</h5>
                    <p class="opacity-75">
                        Reliable service with secure and safe payments.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Modern Hover CSS -->
<style>
.offer-card {
    transition: all 0.3s ease-in-out;
    border: none;
}

.offer-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0,0,0,0.18);
}
</style>



<!-- ====================== TEAM SECTION (Modern Style) ====================== -->
<section class="py-5" style="background: #f8fafc;">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="font-size: 2.2rem;">Meet Our Team</h2>

        <div class="row g-4 justify-content-center">

            <!-- Team Member -->
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded-4 shadow-sm"
                     style="transition: 0.3s; border: 1px solid #e5e7eb;">
                    
                    <img src="../assets/images/founder.jpg"
                         class="rounded-circle shadow-sm mb-3"
                         style="width: 130px; height: 130px; object-fit: cover;">
                    
                    <h5 class="fw-bold mb-1">Amit Sharma</h5>
                    <p class="text-muted mb-2">Founder & CEO</p>
                    <p style="font-size: 0.95rem;">Strategic leader passionate about delivering smart car rental solutions.</p>
                </div>
            </div>

            <!-- Team Member -->
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded-4 shadow-sm"
                     style="transition: 0.3s; border: 1px solid #e5e7eb;">
                    
                    <img src="../assets/images/manager.jpg"
                         class="rounded-circle shadow-sm mb-3"
                         style="width: 130px; height: 130px; object-fit: cover;">
                    
                    <h5 class="fw-bold mb-1">Riya Verma</h5>
                    <p class="text-muted mb-2">Operations Manager</p>
                    <p style="font-size: 0.95rem;">Ensures smooth customer support and seamless booking experience.</p>
                </div>
            </div>

            <!-- Team Member -->
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded-4 shadow-sm"
                     style="transition: 0.3s; border: 1px solid #e5e7eb;">
                    
                    <img src="../assets/images/lead.jpg"
                         class="rounded-circle shadow-sm mb-3"
                         style="width: 130px; height: 130px; object-fit: cover;">
                    
                    <h5 class="fw-bold mb-1">Rahul Sen</h5>
                    <p class="text-muted mb-2">Technical Lead</p>
                    <p style="font-size: 0.95rem;">Handles the platform development, security and system updates.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Simple Hover Effect -->
<style>
    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border-color: #d1d5db;
    }
</style>

<!-- ====================== WHY CHOOSE US - Elegant Premium Style ====================== -->
<section class="py-5" style="background: linear-gradient(to bottom right, #f0f4ff, #ffffff);">
    <div class="container">

        <h2 class="fw-bold text-center mb-5" 
            style="font-size: 2.3rem; letter-spacing: 1px;">
            Why Choose Us?
        </h2>

        <div class="row g-4 align-items-center">

            <!-- Text Content -->
            <div class="col-md-6">
                <div class="p-4 bg-white rounded-4 shadow-sm"
                     style="border: 1px solid #e2e8f0; transition: 0.3s;">
                    
                    <ul class="list-unstyled m-0">
Ami barnali
                        <li class="d-flex align-items-start mb-4">
                            <span class="me-3 fs-4" style="
                                color: #2563eb; 
                                background:#e0ebff; 
                                padding:6px 10px; 
                                border-radius:10px;">
                                ✔
                            </span>
                            <p class="m-0 fw-semibold" style="font-size: 1.05rem;">
                                Fast and seamless booking process
                            </p>
                        </li>

                        <li class="d-flex align-items-start mb-4">
                            <span class="me-3 fs-4" style="
                                color: #2563eb; 
                                background:#e0ebff; 
                                padding:6px 10px; 
                                border-radius:10px;">
                                ✔
                            </span>
                            <p class="m-0 fw-semibold" style="font-size: 1.05rem;">
                                Well-maintained and verified vehicles
                            </p>
                        </li>

                        <li class="d-flex align-items-start mb-4">
                            <span class="me-3 fs-4" style="
                                color: #2563eb; 
                                background:#e0ebff; 
                                padding:6px 10px; 
                                border-radius:10px;">
                                ✔
                            </span>
                            <p class="m-0 fw-semibold" style="font-size: 1.05rem;">
                                Affordable pricing with no hidden charges
                            </p>
                        </li>

                        <li class="d-flex align-items-start mb-4">
                            <span class="me-3 fs-4" style="
                                color: #2563eb; 
                                background:#e0ebff; 
                                padding:6px 10px; 
                                border-radius:10px;">
                                ✔
                            </span>
                            <p class="m-0 fw-semibold" style="font-size: 1.05rem;">
                                24/7 dedicated customer support
                            </p>
                        </li>

                        <li class="d-flex align-items-start">
                            <span class="me-3 fs-4" style="
                                color: #2563eb; 
                                background:#e0ebff; 
                                padding:6px 10px; 
                                border-radius:10px;">
                                ✔
                            </span>
                            <p class="m-0 fw-semibold" style="font-size: 1.05rem;">
                                Real-time car availability & instant updates
                            </p>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-md-6">
                <div class="rounded-4 shadow-lg overflow-hidden"
                     style="border: 1px solid #d8dee9; transform: translateY(0); transition: 0.4s;">
                    <img src="../assets/images/why.jpg"
                         class="img-fluid"
                         style="transition: 0.5s; object-fit: cover;">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Hover Effects -->
<style>
    /* Image Zoom */
    .col-md-6 img:hover {
        transform: scale(1.08);
    }

    /* Card hover smooth lift */
    .p-4:hover {
        transform: translateY(-6px);
        box-shadow: 0px 12px 25px rgba(0,0,0,0.1);
    }
</style>


<!-- ====================== FINAL CTA ====================== -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #0056b3, #001f3f);">
    <div class="container">
        <h2 class="fw-bold">Your Journey Starts Here</h2>
        <p class="lead mb-4">Book your car today and travel with confidence!</p>
        <a href="cars.php" class="btn btn-warning btn-lg rounded-pill px-4">
            Browse Cars
        </a>
    </div>
</section>

<?php
include '../include/footer.php';
?>

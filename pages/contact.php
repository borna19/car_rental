<?php
include '../include/header.php';
include '../include/db.php';
?>

<section class="py-5" style="background:#eef1f6;">
    <div class="container">

        <!-- Title -->
        <h2 class="text-center fw-bold mb-2" style="letter-spacing:0.5px;">Contact Us</h2>
        <p class="text-center text-muted mb-5" style="max-width:600px; margin:auto; font-size:15px;">
            We'd love to hear from you. Reach out anytime — we respond quickly.
        </p>

        <div class="row g-4">

            <!-- LEFT : CONTACT INFO -->
            <div class="col-md-4">
                <div class="bg-white p-4 shadow-sm rounded-4" 
                     style="transition:0.3s; border:1px solid #e6e6e6;">
                     
                    <h5 class="fw-bold mb-3">📍 Address</h5>
                    <p class="text-muted mb-4">
                        Salt Lake, Sector – V, Kolkata, West Bengal, India
                    </p>

                    <h5 class="fw-bold mb-3">📞 Phone</h5>
                    <p class="text-muted mb-4">+91 9876543210</p>

                    <h5 class="fw-bold mb-3">📧 Email</h5>
                    <p class="text-muted mb-4">support@carrental.com</p>

                    <h5 class="fw-bold mb-3">⏱ Hours</h5>
                    <p class="text-muted mb-4">Mon – Sun : 9 AM – 9 PM</p>

                    <h5 class="fw-bold mb-3">🌐 Follow Us</h5>

                    <div class="d-flex gap-3 fs-4">

                        <a href="#" class="text-primary" 
                           style="transition:0.2s;"><i class="bi bi-facebook"></i></a>

                        <a href="#" class="text-danger"
                           style="transition:0.2s;"><i class="bi bi-instagram"></i></a>

                        <a href="#" class="text-info"
                           style="transition:0.2s;"><i class="bi bi-twitter"></i></a>

                        <a href="#" class="text-danger"
                           style="transition:0.2s;"><i class="bi bi-youtube"></i></a>

                    </div>
                </div>
            </div>

            <!-- RIGHT : CONTACT FORM -->
            <div class="col-md-8">
                <div class="bg-white p-4 shadow-sm rounded-4" 
                     style="border:1px solid #e6e6e6;">

                    <h4 class="fw-bold mb-3">Send Us a Message</h4>

                    <form method="POST">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Your Name</label>
                                <input type="text" class="form-control p-3" name="name" required 
                                       style="border-radius:10px;">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control p-3" name="email" required
                                       style="border-radius:10px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="text" class="form-control p-3" name="phone"
                                   style="border-radius:10px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Your Message</label>
                            <textarea class="form-control p-3" rows="5" name="message" required
                                      style="border-radius:10px;"></textarea>
                        </div>

                        <button class="btn btn-primary px-4 py-2" name="submit"
                                style="border-radius:8px; font-weight:500;">
                            Send Message
                        </button>
                    </form>

                    <!-- Insert into DB -->
                    <?php
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];

                        $sql = "INSERT INTO contact_messages(name,email,phone,message)
                                VALUES('$name','$email','$phone','$message')";

                        if(mysqli_query($conn, $sql)){
                            echo "<div class='alert alert-success mt-3 rounded-3'>
                                    Message sent successfully!
                                  </div>";
                        } else {
                            echo "<div class='alert alert-danger mt-3 rounded-3'>
                                    Something went wrong!
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

        <!-- MAP - MODERN SMALL BOX -->
        <div class="mt-5">
            <h4 class="fw-bold mb-3">Find Us</h4>

            <div class="rounded-4 shadow-sm"
                 style="overflow:hidden; height:260px; border:1px solid #e6e6e6;">

                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248884.05483371028!2d88.45006634472756!3d22.56568984497833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275350398a5b9%3A0x75e165b244323425!2sNewtown%2C%20Kolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1763539806676!5m2!1sen!2sin"
                    width="100%" height="100%" style="border:0;" 
                    allowfullscreen loading="lazy">
                </iframe>

            </div>
        </div>

        <!-- FAQ -->
        <div class="mt-5">
            <h4 class="fw-bold text-center mb-4">Frequently Asked Questions</h4>

            <div class="accordion" id="faqSection">

                <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-semibold" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How do I book a car?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show">
                        <div class="accordion-body text-muted">
                            You can book directly through our website using the “Book Now” page.
                        </div>
                    </div>
                </div>

                <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" data-bs-toggle="collapse" data-bs-target="#faq2">
                            What documents are required?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse">
                        <div class="accordion-body text-muted">
                            You need a valid driving license and a government ID.
                        </div>
                    </div>
                </div>

                <div class="accordion-item shadow-sm mb-3 rounded-3 border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Is there any hidden charge?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse">
                        <div class="accordion-body text-muted">
                            No, we follow a transparent pricing system with no hidden fees.
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<?php include '../include/footer.php'; ?>

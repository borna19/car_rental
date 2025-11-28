<?php
session_start();
include '../include/header.php';
include '../include/db.php'; // DATABASE CONNECTION

$successMsg = "";
$errorMsg = "";

// -------------------- SAVE FEEDBACK --------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $rating = intval($_POST['rating']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO feedback (name, email, rating, message)
            VALUES ('$name', '$email', '$rating', '$message')";

    if (mysqli_query($conn, $sql)) {
        $successMsg = "Thank you! Your feedback has been submitted successfully.";
    } else {
        $errorMsg = "Something went wrong. Please try again.";
    }
}
?>

<style>
body {
    background: #eef2f7;
    font-family: "Poppins", sans-serif;
}

.feedback-section {
    padding: 70px 0;
}

.feedback-card {
    max-width: 650px;
    margin: auto;
    background: #ffffff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    border: none;
    transition: 0.3s ease-in-out;
}

.feedback-card:hover {
    transform: translateY(-4px);
}

.feedback-title {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    color: #0d1b2a;
    margin-bottom: 10px;
}

.feedback-subtitle {
    text-align: center;
    color: #6c7a91;
    margin-bottom: 30px;
    font-size: 0.95rem;
}

.form-label {
    font-weight: 500;
    color: #1b263b;
}

.form-control, .form-select {
    border-radius: 10px;
    padding: 12px 15px;
    border: 1px solid #d8dde6;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #4a90e2;
    box-shadow: 0 0 7px rgba(74,144,226,0.3);
}

.btn-submit {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #4a90e2, #357ae8);
    border: none;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 10px;
    color: #fff;
    transition: 0.3s ease-in-out;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #357ae8, #2f6cc3);
}
</style>

<section class="feedback-section">
    <div class="container">
        <div class="feedback-card">

            <h2 class="feedback-title">Share Your Feedback</h2>
            <p class="feedback-subtitle">We value your experience—your feedback helps us improve our service.</p>

            <!-- SUCCESS MESSAGE -->
            <?php if (!empty($successMsg)) { ?>
                <div class="alert alert-success text-center"><?php echo $successMsg; ?></div>
            <?php } ?>

            <!-- ERROR MESSAGE -->
            <?php if (!empty($errorMsg)) { ?>
                <div class="alert alert-danger text-center"><?php echo $errorMsg; ?></div>
            <?php } ?>

            <form action="" method="POST">

                <div class="mb-3">
                    <label class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" placeholder="yourmail@example.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate Our Service</label>
                    <select class="form-select" name="rating" required>
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                        <option value="4">⭐⭐⭐⭐ Very Good</option>
                        <option value="3">⭐⭐⭐ Good</option>
                        <option value="2">⭐⭐ Average</option>
                        <option value="1">⭐ Poor</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Your Feedback</label>
                    <textarea name="message" class="form-control" rows="4" placeholder="Write your experience..." required></textarea>
                </div>

                <button class="btn-submit">Submit Feedback</button>
            </form>

        </div>
    </div>
</section>

<?php include '../include/footer.php'; ?>

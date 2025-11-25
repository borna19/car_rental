<?php
session_start();
include '../include/db.php';

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // ---------- CHECK USERS TABLE ----------
    $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            // ------- SET SESSION -------
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role']; // Admin or Customer

            // ------- CHECK ROLE -------
            if ($user['role'] === "Admin") {
                header("Location: ../pages/dashboard.php");
            } else {
                header("Location: ../index.php"); // Customer homepage
            }
            exit;
        }
    }

    // ---------- INVALID LOGIN ----------
    $_SESSION['error'] = "Invalid email or password!";
    header("Location: ../login.php");
    exit;
}
?>

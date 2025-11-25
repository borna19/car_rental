<?php
session_start();
include '../include/db.php';

if(isset($_POST['register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Check if email exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        $_SESSION['error'] = "Email already registered!";
        header('Location: ../index.php');
        exit;
    }

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = "Account created successfully! Please login.";
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($conn);
        header('Location: ../index.php');
        exit;
    }
}
?>

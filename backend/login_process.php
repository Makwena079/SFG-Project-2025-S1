<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email_address = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email_address'] = $user['email_address'];
        header('Location: ../pages/dashboard.php');
    } else {
        echo "<script>alert('Invalid email or password');</script>";
        header('Location: ../pages/login.php');
    }
}
?>
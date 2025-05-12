<?php
include('../includes/db.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $id_number = $_POST['id_number'];
    $role = $_POST['role'];

    $sql = "INSERT INTO users (first_name, last_name, email_address, password, phone, id_number, role) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$id_number', '$role')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../pages/login.php');
    } else {
        echo "<script>alert('Error during registration');</script>";
    }
}
?>
<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$user = get_user_info($_SESSION['email_address']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room = $_POST['room'];
    $issue = $_POST['issue'];
    $uid = $user['id'];

    $sql = "INSERT INTO maintenance_requests (room_name, issue_description, user_id)
            VALUES ('$room', '$issue', $uid)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Request submitted');</script>";
        header('Location: ../pages/maintenance.php');
    exit();

    } else {
        echo "<script>alert('Submission failed');</script>";
        header('Location: ../pages/maintenance.php');
    exit();

    }
}


?>
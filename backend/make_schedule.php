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
    $class = $_POST['class'];
    $date = $_POST['date'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $prof_id = $user['id'];

    $sql = "INSERT INTO class_schedules (class_name, class_date, start_time, end_time, professor_id)
            VALUES ('$class', '$date', '$start', '$end', $prof_id)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Class scheduled');</script>";
        header('Location: ../pages/class_schedule.php');
    exit();
    } else {
        echo "<script>alert('Failed to schedule');</script>";
         header('Location: ../pages/class_schedule.php');
    exit();
    }
}

$schedules = mysqli_query($conn, "SELECT * FROM class_schedules WHERE professor_id = {$user['id']}");

include('../includes/header.php');
?>
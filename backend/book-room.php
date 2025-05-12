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
    $date = $_POST['date'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $uid = $user['id'];

    $sql = "INSERT INTO room_bookings (room_name, booking_date, start_time, end_time, user_id)
            VALUES ('$room', '$date', '$start', '$end', $uid)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Room booked successfully');</script>";
        header('Location: ../pages/room_booking.php?Book-Success=true');
        exit();
    } else {
        echo "<script>alert('Booking failed');</script>";
        header('Location: ../pages/room_booking.php');
        exit();
    }
}

include('../includes/header.php');
?>
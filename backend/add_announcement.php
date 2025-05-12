<?php
session_start();
include('../includes/db.php');
include('../includes/functions.php');

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$user = get_user_info($_SESSION['email_address']);

if ($user['role'] == 'admin' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['announcement'];
    $sql = "INSERT INTO announcements (announcement_text, created_by) VALUES ('$text', {$user['id']})";
    mysqli_query($conn, $sql);
}

$announcements = mysqli_query($conn, "SELECT a.*, u.first_name FROM announcements a JOIN users u ON a.created_by = u.id ORDER BY a.created_at DESC");
header('Location: ../pages/announcements.php');
    exit();
?>
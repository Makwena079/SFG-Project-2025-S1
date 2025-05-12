<?php
// Function to check if the user is logged in
function is_logged_in() {
    return isset($_SESSION['email_address']);
}

// Function to fetch user info
function get_user_info($email) {
    global $conn;
    $sql = "SELECT * FROM users WHERE email_address = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>


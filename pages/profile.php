<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="../assets/css/style.css">
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1HIz4Jt4DkzjE2xBujm7uHkshj5jMQu3znd3P3pZ8bR" crossorigin="anonymous">

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QY6ktJTwK9z2Ij8wZV0xL8rHF8Q2OqLzYECv3ibK+7OtRwaAxAqXxqOCDX2yf40d" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>


     <title>TUT System</title>


</head>

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
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET first_name='$first', last_name='$last', phone='$phone' WHERE email_address='{$_SESSION['email_address']}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Profile updated successfully');</script>";
        $user = get_user_info($_SESSION['email_address']);
    } else {
        echo "<script>alert('Error updating profile');</script>";
    }
}

include('../includes/header.php');
?>

<main class="ms-md-5 p-4">
    <div class="container">
        <h2 class="mb-4">Your Profile</h2>

        <form method="POST" class="card shadow p-4" style="max-width: 500px;">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name']); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name']); ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($user['phone']); ?>" class="form-control" required>
            </div><br><br><br>
            <button type="submit" class="btn btn-dark">Update Profile</button>
        </form>
    </div>
</main>


<?php include('../includes/footer.php'); ?>

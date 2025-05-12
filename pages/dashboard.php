
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
    header('Location: ../login.php');
    exit();
}

$user_info = get_user_info($_SESSION['email_address']);
include('../includes/header.php');
?>

<main class="ms-md-5 p-4">
    <div class="container">
        <header class="mb-4">
            <h2 class="text-primary">Welcome, <?= htmlspecialchars($user_info['first_name']); ?></h2>
        </header>

        <section class="card shadow p-4">
            <h3 class="mb-3">Your Information</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($user_info['email_address']); ?></li>
                <li class="list-group-item"><strong>Role:</strong> <?= htmlspecialchars($user_info['role']); ?></li>
                <li class="list-group-item"><strong>Phone:</strong> <?= htmlspecialchars($user_info['phone']); ?></li>
                <li class="list-group-item"><strong>ID Number:</strong> <?= htmlspecialchars($user_info['id_number']); ?></li>
            </ul>
        </section>
    </div>
</main>


<?php include('../includes/footer.php'); ?>


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



$schedules = mysqli_query($conn, "SELECT * FROM class_schedules WHERE professor_id = {$user['id']}");

include('../includes/header.php');
?>

<main class="ms-md-5 p-4">
    <div class="container">
        <h2 class="mb-4">Class Schedule</h2>

        <form method="POST" action="../backend/make_schedule.php" class="mb-5">
            <div class="mb-3">
                <label for="class" class="form-label">Class Name:</label>
                <input type="text" id="class" name="class" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">End Time:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" required>
            </div><br><br><br>
            <button type="submit" class="btn btn-dark">Add Class</button>
        </form>

        <h3 class="mb-3">Your Scheduled Classes</h3>
        <ul class="list-group">
            <?php while ($row = mysqli_fetch_assoc($schedules)) : ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($row['class_name']) ?> -
                    <?= htmlspecialchars($row['class_date']) ?> 
                    (<?= htmlspecialchars($row['start_time']) ?> - <?= htmlspecialchars($row['end_time']) ?>)
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</main>


<?php include('../includes/footer.php'); ?>

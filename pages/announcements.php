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

$announcements = mysqli_query($conn, "SELECT a.*, u.first_name FROM announcements a JOIN users u ON a.created_by = u.id ORDER BY a.created_at DESC");


include('../includes/header.php');
?>

<main class="ms-md-5 p-4">
    <div class="container">
        <h2 class="mb-4">Campus Announcements</h2>

        <?php if ($user['role'] == 'admin') : ?>
            <form method="POST" action="../backend/add_announcement.php" class="mb-5">
                <div class="mb-3">
                    <label for="announcement" class="form-label">New Announcement:</label>
                    <textarea name="announcement" id="announcement" class="form-control" rows="3" required></textarea>
                </div><br><br><br>
                <button type="submit" class="btn btn-dark">Post</button>
            </form>
        <?php endif; ?>

        <ul class="list-group">
            <?php while ($a = mysqli_fetch_assoc($announcements)) : ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($a['first_name']) ?>:</strong>
                    <?= htmlspecialchars($a['announcement_text']) ?>
                    <em class="text-muted float-end">(<?= htmlspecialchars($a['created_at']) ?>)</em>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</main>


<?php include('../includes/footer.php'); ?>
